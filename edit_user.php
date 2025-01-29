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

// Fetch user details if an ID is provided
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM userdetails WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "<script>alert('User not found.'); window.location.href = 'manage_users.php';</script>";
        exit;
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'manage_users.php';</script>";
    exit;
}

// Update user details when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Add validation here if required

    $update_sql = "UPDATE userdetails SET username = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssi", $username, $email, $password, $id);

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully.'); window.location.href = 'manage_users.php';</script>";
    } else {
        echo "<script>alert('Error updating user.');</script>";
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
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
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

        input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
            
            <div class="actions">
                <button type="submit" name="update_user" class="btn btn-update">Update</button>
                <a href="manage_users.php" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
