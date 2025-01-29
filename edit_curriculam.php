<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    echo "<script>alert('Please log in to access this page.'); window.location.href = 'login.php';</script>";
    exit;
}

// Database connection settings
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "skillroute"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch curriculum details if an ID is provided
if (isset($_GET['id'])) {
    $curriculam_id = $_GET['id'];

    $sql = "SELECT * FROM curriculam WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $curriculam_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $curriculum = $result->fetch_assoc();
    } else {
        echo "<script>alert('Entry not found.'); window.location.href = 'setting.php';</script>";
        exit;
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'setting.php';</script>";
    exit;
}

// Update curriculum details when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_curriculam'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $path = $_POST['path'];
    $roadmap = $_POST['roadmap'];

    $update_sql = "UPDATE curriculam SET title = ?, image = ?, path = ?, roadmap = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssssi", $title, $image, $path, $roadmap, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Curriculum updated successfully.'); window.location.href = 'setting2.php';</script>";
    } else {
        echo "<script>alert('Error updating curriculum.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Curriculum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1A1A1D;
            color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #2A2A2D;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #A64D79;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, textarea {
            padding: 10px;
            border: 1px solid #444;
            border-radius: 4px;
            background-color: #333;
            color: #f4f4f4;
            width: 100%;
        }

        textarea {
            resize: vertical;
        }

        .btn {
            padding: 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .btn-update {
            background-color: #28a745;
        }

        .btn-cancel {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-cancel {
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Curriculum</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $curriculum['id']; ?>">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($curriculum['title']); ?>" required>

            <label for="image">Image:</label>
            <input type="text" name="image" id="image" value="<?php echo htmlspecialchars($curriculum['image']); ?>" required>

            <label for="path">Path:</label>
            <input type="text" name="path" id="path" value="<?php echo htmlspecialchars($curriculum['path']); ?>" required>

            <label for="roadmap">Roadmap:</label>
            <textarea name="roadmap" id="roadmap" rows="5"><?php echo htmlspecialchars($curriculum['roadmap']); ?></textarea>

            <div class="actions">
                <button type="submit" name="update_curriculum" class="btn btn-update">Update</button>
                <a href="setting.php" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
