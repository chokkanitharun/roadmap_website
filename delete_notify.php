<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $filePath = 'notifications.json';

    $notifications = [];
    if (file_exists($filePath)) {
        $notifications = json_decode(file_get_contents($filePath), true);
    }

    // Remove the notification
    if (isset($notifications[$index])) {
        array_splice($notifications, $index, 1);
        file_put_contents($filePath, json_encode($notifications, JSON_PRETTY_PRINT));
    }

    // Redirect back to admin page
    header('Location: admin_notify.php');
    exit;
}
?>
