<?php
$filePath = 'notifications.json';
$index = $_GET['index'];
$notifications = [];

if (file_exists($filePath)) {
    $notifications = json_decode(file_get_contents($filePath), true);
}

$notification = $notifications[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 500px;
            margin: auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="url"], button {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Edit Notification</h1>
    <form action="update_notify.php" method="POST">
        <input type="hidden" name="index" value="<?= $index ?>">

        <label for="title">Notification Title:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($notification['title']) ?>" required>

        <label for="link">Notification Link:</label>
        <input type="url" id="link" name="link" value="<?= htmlspecialchars($notification['link']) ?>" required>

        <button type="submit">Update Notification</button>
    </form>
</body>
</html>
