<?php
// Read notifications from JSON file
$filePath = 'notifications.json';
$notifications = [];

if (file_exists($filePath)) {
    $notifications = json_decode(file_get_contents($filePath), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Notifications</title>
    <style>
       /* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #3B1C32;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}

/* Form Styles */
form {
    max-width: 900px;
    background-color: #EEEEEE;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
    transition: transform 0.3s ease-in-out;
}

form:hover {
    transform: scale(1.02);
}

/* Label Styles */
label {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #444;
}

/* Input and Button Styles */
input[type="text"], input[type="url"], button {
    width: 90%;
    padding: 12px;
    margin: 8px 0 18px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
}
h1,h2{
    color:white;
}

/* Input Focus */
input[type="text"]:focus, input[type="url"]:focus {
    border-color: #4caf50;
    outline: none;
    box-shadow: 0 0 10px rgba(76, 175, 80, 0.2);
}

/* Button Styles */
button {
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    padding: 12px;
    border-radius: 8px;
}

button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

/* Notification Styles */
.notifications {
    max-width: 600px;
    margin-top: 40px;
    width: 100%;
}

.notification {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease-in-out;
}

.notification:hover {
    background-color: #f1f1f1;
    transform: scale(1.02);
}

.notification a {
    color: #0073e6;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.notification a:hover {
    color: #005bb5;
}

/* Button inside notifications */
.notification button {
    background-color: transparent;
    border: none;
    padding: 8px 15px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    border-radius: 5px;
}

.notification button:hover {
    transform: scale(1.1);
}

/* Edit and Delete Button Styles */
/* Edit and Delete Button Styles */
.edit {
    background-color: #A64D79; /* Purple */
    color: red;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.delete {
    background-color: #6A1E55; /* Darker Red-Purple */
    color: red;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

/* Hover effects for Edit and Delete buttons */
.edit:hover {
    background-color: #1A1A1D; /* Darker blackish tone */
    transform: scale(1.05); /* Slightly enlarge button */
}

.delete:hover {
    background-color: #A64D79; /* Lighter purple */
    transform: scale(1.05); /* Slightly enlarge button */
}

/* Active state for Edit and Delete buttons */
.edit:active {
    background-color: #6A1E55; /* Darker red-purple */
    transform: scale(1); /* Return to original size */
}

.delete:active {
    background-color: #1A1A1D; /* Darkest tone */
    transform: scale(1); /* Return to original size */
}


/* Smooth transitions for UI elements */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

form, .notification {
    animation: fadeIn 0.8s ease-in-out;
}

    </style>
</head>
<body>
    <h1>Admin Notification Management</h1>
    <form action="submit_notify.php" method="POST">
        <label for="title">Notification Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="link">Notification Link:</label>
        <input type="url" id="link" name="link" required>

        <button type="submit">Add Notification</button>
    </form>

    <h2>Existing Notifications</h2>
    <div class="notifications">
        <?php if (!empty($notifications)): ?>
            <?php foreach ($notifications as $index => $notification): ?>
                <div class="notification">
                    <div>
                        <strong><?= htmlspecialchars($notification['title']) ?></strong><br>
                        <a href="<?= htmlspecialchars($notification['link']) ?>" target="_blank"><?= htmlspecialchars($notification['link']) ?></a>
                    </div>
                    <div>
                        <form action="edit_notify.php" method="GET" style="display: inline;">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit" class="edit">Edit</button>
                        </form>
                        <form action="delete_notify.php" method="POST" style="display: inline;">
                            <input type="hidden" name="index" value="<?= $index ?>">
                            <button type="submit" class="delete">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No notifications available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
