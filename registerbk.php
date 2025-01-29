<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skillroute";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$aadhar_num = $_POST['aadhar_num'];

// Validate username
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{9,}$/', $username)) {
    echo "<script type='text/javascript'>alert('Username must be at least 9 characters long and contain both letters and numbers.');window.history.back();</script>";
    exit;
}

// Validate password
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
    echo "<script type='text/javascript'>alert('Password must be at least 8 characters long, contain at least one special character, one letter, and one number.');window.history.back();</script>";
    exit;
}

// Validate email
if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)) {
    echo "<script type='text/javascript'>alert('Only @gmail.com email addresses are allowed.');window.history.back();</script>";
    exit;
}

// Validate Aadhar number
if (!preg_match('/^\d{12}$/', $aadhar_num)) {
    echo "<script type='text/javascript'>alert('Aadhar number must contain exactly 12 digits.');window.history.back();</script>";
    exit;
}

// Check for existing username, email, password, or Aadhar number
$check_sql = "SELECT * FROM userdetails WHERE username = '$username' OR email = '$email' OR password = '$password' OR aadhar_num = '$aadhar_num'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "<script type='text/javascript'>alert('A user with the same username, email, password, or Aadhar number already exists. Please use different details.');window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO userdetails (username, email, password, aadhar_num) VALUES ('$username', '$email', '$password', '$aadhar_num')";

if ($conn->query($sql) === TRUE) {
    // Log signup activity
    $user_id = $conn->insert_id; // Get the ID of the newly created user
    $activity_sql = "INSERT INTO user_activity (user_id, activity_type) VALUES ('$user_id', 'signup')";
    $conn->query($activity_sql);

    echo "<script type='text/javascript'>alert('Registered successfully');window.location.href='login.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>