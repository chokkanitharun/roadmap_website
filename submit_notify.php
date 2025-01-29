<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $link = $_POST['link'];

    $filePath = 'notifications.json';
    $notifications = [];

    // Load existing notifications
    if (file_exists($filePath)) {
        $notifications = json_decode(file_get_contents($filePath), true);
    }

    // Add the new notification
    $notifications[] = ['title' => $title, 'link' => $link];

    // Save back to the JSON file
    file_put_contents($filePath, json_encode($notifications, JSON_PRETTY_PRINT));

    // Redirect back to admin page
    header('Location: admin_notify.php');
    exit;
}
?>
