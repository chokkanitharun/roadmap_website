<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $title = $_POST['title'];
    $link = $_POST['link'];

    $filePath = 'notifications.json';
    $notifications = [];

    if (file_exists($filePath)) {
        $notifications = json_decode(file_get_contents($filePath), true);
    }

    // Update the notification
    if (isset($notifications[$index])) {
        $notifications[$index] = ['title' => $title, 'link' => $link];
        file_put_contents($filePath, json_encode($notifications, JSON_PRETTY_PRINT));
    }

    // Redirect back to admin page
    header('Location: admin_notify.php');
    exit;
}
?>
