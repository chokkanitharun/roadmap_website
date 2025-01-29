<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="email"], input[type="submit"] {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #6A1E55;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #A64D79;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "skillroute";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $email = $_POST['email'];

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<p class='error'>Invalid email format. Please enter a valid email address.</p>";
            } else {
                $sql = "SELECT * FROM userdetails WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<script>window.location.href='reset.php?email=$email';</script>";
                } else {
                    echo "<p class='error'>Email not found. Please try again.</p>";
                }

                $stmt->close();
            }

            $conn->close();
        }
        ?>
        <form action="" method="post">
            <label for="email">Enter Your Registered Email</label>
            <input type="email" name="email" id="email" placeholder="example@example.com" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
