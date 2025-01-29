<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "skillroute";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if new password and confirm password match
    if ($new_password != $confirm_password) {
        echo "<script type='text/javascript'>alert('Passwords do not match.');window.location.href='reset.php';</script>";
        exit();
    }

    // Check if the username exists
    $sql = "SELECT * FROM userdetails WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Update the password in the database
        $update_sql = "UPDATE userdetails SET password='$new_password' WHERE username='$username'";
        if ($conn->query($update_sql) === TRUE) {
            echo "<script type='text/javascript'>alert('Password successfully updated.');window.location.href='login.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Error updating password. Please try again.');window.location.href='reset.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Username does not exist.');window.location.href='reset.php';</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form method="POST" action="reset.php">
            <input type="text" name="username" placeholder="Enter your username" required>
            <input type="password" name="new_password" placeholder="Enter new password" required>
            <input type="password" name="confirm_password" placeholder="Confirm new password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
