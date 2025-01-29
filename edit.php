<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "skillroute";

$conn = new mysqli($servername, $username, $password, $databasename);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the existing record
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM curriculam WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if (!$row) {
        die("Roadmap not found!");
    }
} else {
    die("Invalid request!");
}

// Handle the update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $title = $_POST['title'];
    $path = $_POST['path'];
    $roadmap = $_POST['roadmap'];

    $image = $row['image']; // Default to the existing image
    if (!empty($_FILES['image']['name'])) {
        $uploadDir = 'uploads/';
        $targetFile = $uploadDir . basename($_FILES['image']['name']);
        $fileContent = file_get_contents($_FILES['image']['tmp_name']);
        if (file_put_contents($targetFile, $fileContent)) {
            $image = $_FILES['image']['name']; // Update with the new image name
        }
    }

    // Update the record in the database
    $stmt = $conn->prepare("UPDATE curriculam SET title = ?, image = ?, path = ?, roadmap = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $title, $image, $path, $roadmap, $id);

    if ($stmt->execute()) {
        // Redirect with a success parameter to display the pop-up
        header("Location: edit.php?id=$id&success=1");
        exit();
    } else {
        $response = ["success" => false, "message" => "Failed to update the roadmap."];
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Roadmap</title>
    <style>
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input, select, button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background-color: #45a049;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
    <script>
        // JavaScript to handle success pop-up and redirection
        function showSuccessMessage() {
            alert("Roadmap updated successfully!");
            window.location.href = "prac.php"; // Redirect to prac.php after alert
        }
    </script>
</head>
<body>
<div class="container">
    <h1>Edit Roadmap</h1>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <script>
            showSuccessMessage();
        </script>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($row['title']); ?>" required>

        <label for="image">Image (Optional)</label>
        <input type="file" id="image" name="image" accept="image/*">

        <label for="path">Path</label>
        <input type="text" id="path" name="path" value="<?= htmlspecialchars($row['path']); ?>" required>

        <label for="roadmap">Roadmap Type</label>
        <select id="roadmap" name="roadmap" required>
            <option value="Role Based Roadmaps" <?= $row['roadmap'] === 'Role Based Roadmaps' ? 'selected' : ''; ?>>Role Based Roadmaps</option>
            <option value="Skill Based Roadmaps" <?= $row['roadmap'] === 'Skill Based Roadmaps' ? 'selected' : ''; ?>>Skill Based Roadmaps</option>
            <option value="Project Ideas" <?= $row['roadmap'] === 'Project Ideas' ? 'selected' : ''; ?>>Project Ideas</option>
        </select>

        <button type="submit">Update Roadmap</button>
    </form>
</div>
</body>
</html>
