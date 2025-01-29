<?php
// Read notifications from the JSON file
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
    <title>Notifications</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: white; /* User-preferred color */
        color: white;
    }
    a{
            text-decoration:none;
            color:#e05d5dff;
            font-weight:bold;
        }

    h1 {
        color:  #e05d5dff; /* User-preferred color */
        text-align: center;
    }

    .notification {
        border: 1px solid #6A1E55; /* User-preferred color */
        border-radius: 5px;
        padding: 15px;
        margin: 10px 0;
        background-color:  #e05d5dff;
        color: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        opacity: 0;
        animation: fadeIn 0.5s ease forwards;
    }

    .notification a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .notification a:hover {
        text-decoration: underline;
    }

    .notification strong {
        display: block;
        font-size: 18px;
        margin-bottom: 5px;
        color: white; /* Gold for emphasis */
    }

    .notification:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const notifications = document.querySelectorAll(".notification");

        // Add a delay for staggered animations
        notifications.forEach((notification, index) => {
            notification.style.animationDelay = `${index * 0.2}s`;

            // Add hover effect with a sound feedback
            notification.addEventListener("mouseover", () => {
                const audio = new Audio("hover-sound.mp3");
                audio.play();
            });
        });
    });
</script>

</head>
<body>
<h3 ><a href="index.php">Home</a></h3>
    <h1>Notifications</h1>
    <div class="notifications">
        <?php if (!empty($notifications)): ?>
            <?php foreach ($notifications as $notification): ?>
                <div class="notification">
                    <strong><?= htmlspecialchars($notification['title']) ?></strong>
                    <a href="<?= htmlspecialchars($notification['link']) ?>" target="_blank"><?= htmlspecialchars($notification['link']) ?></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No notifications available.</p>
        <?php endif; ?>
    </div>
</body>
</html>
