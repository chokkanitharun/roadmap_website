<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "skillroute";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM userdetails WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["logged_in"] = true;
        $userInfo = $result->fetch_assoc();
        $_SESSION["id"] = $userInfo["id"];
        $_SESSION["username"] = $userInfo["username"];

        // Log user login activity
        $user_id = $userInfo["id"];
        $activity_sql = "INSERT INTO user_activity (user_id, activity_type) VALUES ('$user_id', 'login')";
        $conn->query($activity_sql);

        if ($username == 'tharun' && $password == 'tharusai1623') {
            echo "<script type='text/javascript'>alert('Welcome, Admin!');window.location.href='adminpanel.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Login Successfully.');window.location.href='index.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Invalid Username and Password');window.location.href='login.php';</script>";
    }

    $conn->close();
}
?>
