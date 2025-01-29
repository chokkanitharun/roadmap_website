<?php
// Include the database connection
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
/* General reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #FEF3E2;
    color: 3B1C32;
    display: flex;
    flex-direction: column;
    height: 100vh;
}

/* Header Styling with Gradient */
header {
    background: linear-gradient(135deg, #3B1C32, #3B1C32);
    color: white;
    padding: 20px;
    display: flex;
    justify-content: space-between; /* Adjust for mobile */
    align-items: center;
    position: relative;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: background 0.3s ease, box-shadow 0.3s ease;
}

header:hover {
    background: linear-gradient(135deg, 3B1C32, #3B1C32);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

/* Logo Styling */
header .logo {
    font-size: 1.5rem;
    font-weight: bold;
    color:white;
    letter-spacing: 2px;
    text-transform: uppercase;
    cursor: pointer;
    transition: transform 0.3s ease;
}

/* Notification Bell */
header .notifications {
    position: relative;
    cursor: pointer;
    font-size: 1.6rem;
}

header .notifications:hover {
    transform: rotate(15deg);
}

header .notifications .count {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #3B1C32;
    color: white;
    font-size: 0.8rem;
    padding: 5px 10px;
    border-radius: 50%;
    animation: pulse 1s infinite;
}

/* Container Layout */
.container {
    display: flex;
    flex: 1;
    overflow: hidden;
    background-color: #fff;
}

/* Sidebar Navigation */
nav {
    background:white;
    color: white;
    width: 250px;
    display: flex;
    flex-direction: column;
    padding-top: 20px;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    box-shadow: 4px 0 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

nav a {
    color: white;
    background-color: #3B1C32;
    text-decoration: none;
    padding: 15px 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1rem;
    transition: background-color 0.3s ease;
    border-radius: 4px;
}

nav a.active {
    background-color: #3B1C32;
    box-shadow: 0 4px 6px rgba(214, 40, 40, 0.2);
}

/* Content Area */
.content {
    flex: 1;
    margin-left: 250px;
    padding: 20px;
    background-color: white;
    overflow-y: auto;
    transition: margin-left 0.3s ease;
}

iframe {
    width: 100%;
    height: 100%;
    border: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    nav {
        transform: translateX(-100%);
        position: absolute;
        transition: transform 0.3s ease;
        width: 250px;
    }

    nav.active {
        transform: translateX(0);
    }

    header {
        justify-content: space-between;
    }

    header .menu-toggle {
        font-size: 1.5rem;
        cursor: pointer;
        display: block;
    }

    .content {
        margin-left: 0;
    }
}

/* Keyframe Animations */
@keyframes pulse {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.2);
        opacity: 0.8;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Smooth Scroll */
html {
    scroll-behavior: smooth;
}
    </style>
</head>
<body>
    <header>
        <div class="logo">Admin Panel</div>
        <div class="menu-toggle" onclick="toggleNav()">
            <i class="fas fa-bars"></i>
        </div>
    </header>
    <div class="container">
        <nav>
            <a href="admin.php" target="content" class="active">
                <i class="fas fa-home"></i> Edit links and curriculum list
            </a>
            <br>
            <a href="prac.php" target="content">
                <i class="fas fa-book"></i> Edit roadmaps
            </a><br>
            <a href="admin_notify.php" target="content">
                <i class="fas fa-route"></i> Manage notifications
            </a><br>
            <a href="setting.php" target="content">
                <i class="fas fa-users"></i> Manage Users
            </a><br>
            <a href="useractivity.php" target="content">
                <i class="fas fa-chart-bar"></i> User Activity Report
            </a><br>
            <a href="setting3.php" target="content">
            <i class="fas fa-tasks"></i> edit user_activity
            </a><br>
            <a href="setting4.php" target="content">
            <i class="fas fa-sticky-note"></i> notes edit
            </a><br>
            <a href="setting2.php" target="content">
                <i class="fas fa-cogs"></i> Settings
            </a>
            
        </nav>
        <div class="content">
            <iframe name="content" src="admin.php"></iframe>
        </div>
    </div>

    <script>
        function toggleNav() {
            const nav = document.querySelector('nav');
            nav.classList.toggle('active');
        }
    </script>
</body>
</html>
