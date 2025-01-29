<?php
session_start();

// Check if user is logged in and set the welcome message accordingly
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true && isset($_SESSION["username"])) {
    $welcomeMessage = "Welcome, " . htmlspecialchars($_SESSION["username"]) . "!";
} else {
    $welcomeMessage = "Welcome Developers";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Other head content here -->


    <title>Developer Roadmaps</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background-color: #f9f9f9;
    }

    header {
        background-color: #ef4444;
        padding: 20px;
        text-align: center;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 50px;
        border-radius: 25px;
    }

    .logo img {
        width: 100px;
        height: auto;
        padding-left:40px;
    }

    .header-text span {
        margin: 50px auto;
        text-align: center;
        font-size: 45px;
        color: hsl(0, 0%, 100%);
        font-weight: bold;
        margin-bottom: 20px;
        padding-left: 120px;
    }

    .auth-buttons {
        display: flex;
    }

    .auth-buttons button {
        margin-left: 10px;
        padding: 10px 20px;
        border: none;
        background-color: white;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .auth-buttons button.signup-btn {
        background-color: #ffffff;
    }

    .welcome-section {
        margin-top: 20px;
        color: rgb(8, 8, 8);
    }

    .welcome-section h1 {
        font-size: 36px;
        margin-bottom: 10px;
        text-align: center;
    }

    .welcome-section p {
        font-size: 16px;
        margin: 0 auto;
        max-width: 1000px;
    }

    h1 {
        animation-duration: 3s;
        animation-name: slidein;
    }

    @keyframes slidein {
        from {
            translate: 150vw 0;
            scale: 200% 1;
        }

        to {
            translate: 0 0;
            scale: 100% 1;
        }
    }

    .roadmap-section {
        margin: 50px auto;
        text-align: center;
    }

    .roadmap-section h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .roadmap-container {
        display: flex;
        overflow-x: scroll;
        padding: 10px 0;
        scrollbar-width: none;
    }

    .roadmap-container::-webkit-scrollbar {
        display: none;
    }

    .roadmap-card {
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 300px;
        flex-shrink: 0;
        margin: 0 15px;
    }

    .roadmap-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .roadmap-card h3 {
    font-size: 18px;
    padding: 10px;
    cursor: pointer;
    color: rgb(7, 7, 7);
    text-decoration: none;
    transition: color 0.3s ease, transform 0.3s ease;
}

.roadmap-card h3:hover {
    color: #A64D79; /* Change the color on hover */
    transform: scale(1.05); /* Slightly enlarge the text */
}


    body {
        background-color: white;
        color: black;
        font-size: 25px;
    }

    .dark-mode {
        background-color: black;
        color: white;
    }

    .mystyle {
        background-color: rgb(12, 12, 12);
        color: white;
    }

    a {
        text-decoration: none;
    }

    footer {
        background-color: #2a2a2a;
        color: white;
        text-align: center;
        padding: 20px;
        margin-top: 30px;
    }

    footer a {
        color: white;
        text-decoration: none;
        margin: 0 10px;
    }

    footer a:hover {
        text-decoration: underline;
    }
    .auth-buttons {
    display: flex;
    align-items: center;
    }

    .notification-btn {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 24px; /* Adjust the size of the bell icon */
        margin-left: 15px;
    }

    .notification-btn i {
        color: black; /* Color for the bell icon */
    }

    .notification-btn:hover i {
        color: #ffcc00; /* Color when hovered */
    }


    /* Media Queries */
    @media (max-width: 768px) {
        .navbar {
            flex-direction: column;
            padding: 20px;
        }

        .header-text span {
            font-size: 30px;
            padding-left: 0;
        }

        .auth-buttons {
            flex-direction: column;
        }

        .auth-buttons button {
            margin: 10px 0;
        }

        .welcome-section h1 {
            font-size: 28px;
        }

        .welcome-section p {
            font-size: 14px;
            padding: 0 20px;
        }

        .roadmap-container {
            flex-direction: column;
            align-items: center;
        }

        .roadmap-card {
            width: 90%;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 480px) {
        .header-text span {
            font-size: 24px;
        }

        .navbar {
            padding: 10px;
        }

        .auth-buttons button {
            padding: 8px 16px;
            font-size: 14px;
        }

        .roadmap-card {
            width: 100%;
        }

        footer {
            font-size: 14px;
        }
    }
    /* Navbar container */
    .navbar {
    display: flex;
    align-items: center;
    padding: 10px;
    position: relative;
    }

    /* Icon styling */
    .navbar a.icon {
    position: absolute;
    top: 10px;
    left: 10px;
    color: white;
    text-decoration: none;
    font-size: 30px;
    cursor: pointer;
    }

    /* Navbar links */
    .navbar #myLinks {
    display: none;
    background-color: black;
    position: absolute;
    top: 50px;
    left: 10px;
    width: 200px;
    border: 1px solid #ddd;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }

    .navbar #myLinks a {
    display: block;
    padding: 10px;
    color:white;
    text-decoration: none;
    font-size: 17px;
    }

    .navbar #myLinks a:hover {
    background-color: #d9534f;
    }

    /* Active link styling */
    .navbar .active {
    background-color: #04AA6D;
    color: white;
    }
 .faq-section {
    padding: 40px;
    background-color: #F1F5F9;
    margin-top: 40px;
}

.faq-section h2 {
    text-align: center;
    font-family: 'Lato', sans-serif;
    font-weight: 700;
    font-size: 28px;
    color: #333;
    margin-bottom: 30px;
}

.faq {
    margin-bottom: 15px;
}

.faq label {
    display: block;
    padding: 15px;
    background-color: #ef4444;
    color: #fff;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.faq label:hover {
    background-color: #9C1B49;
}

.faq-text {
    display: none;
    padding: 15px;
    background-color: #FCE4EC;
    color: #333;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    border-radius: 5px;
}

.faq input[type="checkbox"] {
    display: none;
}

.faq input[type="checkbox"]:checked + label + .faq-text {
    display: block;
}

.faq input[type="checkbox"]:checked + label {
    background-color: #ef4444;
    color: #fff;
}

.search-container {
    display: flex;
    align-items: center;
    margin-left: 20px;
    margin-right: 20px;
    margin-bottom:35px;
}

#searchBar {
    padding: 8px 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    box-shadow:0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8);
    border-radius: 5px;
    margin-right: 5px;
}

#searchBtn {
    background-color: #ef4444;
    color: white;
    border: none;
    padding: 8px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    box-shadow:0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8);
}

#searchBtn i {
    font-size: 18px;
    
}

#searchBtn:hover {
    background-color: #d9534f;
}

</style>

  

    
<script>
           function myFunction() {
           var element = document.body;
           element.classList.toggle("dark-mode");
           var element = document.getElementById("myDIV");
   element.classList.toggle("mystyle");
        }

    document.addEventListener("DOMContentLoaded", () => {
        // Function to show the popup
        function showPopup() {
            const popup = document.createElement("div");
            popup.style.position = "fixed";
            popup.style.top = "50%";
            popup.style.left = "50%";
            popup.style.transform = "translate(-50%, -50%)";
            popup.style.backgroundColor = "white";
            popup.style.border = "1px solid #ddd";
            popup.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.2)";
            popup.style.padding = "20px";
            popup.style.zIndex = "1000";
            popup.style.borderRadius = "10px";
            popup.style.textAlign = "center";

            // Popup content
            popup.innerHTML = `
                <h2>Welcome!</h2>
                <p>To get the most out of SkillRoute, please log in or sign up.</p>
                <button id="loginPopupBtn" style="margin-right: 10px; padding: 10px 20px; border: none; background-color: #ef4444; color: white; border-radius: 5px; cursor: pointer;">Login</button>
                <button id="signupPopupBtn" style="padding: 10px 20px; border: none; background-color: #4CAF50; color: white; border-radius: 5px; cursor: pointer;">Signup</button>
            `;

            // Append popup to body
            document.body.appendChild(popup);

            // Add event listeners for buttons
            document.getElementById("loginPopupBtn").addEventListener("click", () => {
                window.location.href = 'login.php';
            });

            document.getElementById("signupPopupBtn").addEventListener("click", () => {
                window.location.href = 'register.php';
            });

            // Close popup on outside click
            const overlay = document.createElement("div");
            overlay.style.position = "fixed";
            overlay.style.top = "0";
            overlay.style.left = "0";
            overlay.style.width = "100%";
            overlay.style.height = "100%";
            overlay.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
            overlay.style.zIndex = "999";
            document.body.appendChild(overlay);

            overlay.addEventListener("click", () => {
                popup.remove();
                overlay.remove();
            });
        }

        // Check if the user is logged in (backend adds a script tag with the login status)
        const isLoggedIn = <?php echo isset($_SESSION['id']) && $_SESSION['id'] ? 'true' : 'false'; ?>;

        if (!isLoggedIn) {
            // Show the popup after 30 seconds if not logged in
            setTimeout(showPopup, 30000);
        }
    });

    function toggleMenu() {
        const myLinks = document.getElementById('myLinks');
        if (myLinks.style.display === 'block') {
            myLinks.style.display = 'none';
        } else {
            myLinks.style.display = 'block';
        }
    }
   
    function performSearch() {
    const searchQuery = document.getElementById('searchBar').value.toLowerCase();
    const roadmapCards = document.querySelectorAll('.roadmap-card');

    roadmapCards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        if (title.includes(searchQuery)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}

</script>

</head>
<body>
<header>
    <div class="navbar">
        <div class="logo">
            <img src="roadmaplogo.png" alt="Logo">
        </div>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">☰</a>
  <div id="myLinks">
    <a href="notify.php">notifications</a>
    <a href="notes.php"> My Notes</a>
    <a href="feedback.php"> Give feedback</a>
    <a href="logout.php">Logout</a>
  </div>
        <div class="header-text">
            <span>Skill Route</span>
        </div>
        
        <div class="auth-buttons">
            <button onclick="myFunction()">Toggle dark mode</button>
            
            <!-- Notification Icon -->
            <button class="notification-btn" onclick="window.location.href='notify.php'">
                <i class="fas fa-bell"></i>
            </button>
        </div>
    </div>
</header>

    <div class="welcome-section">
    <div class="search-container">
            <input type="text" id="searchBar" placeholder="Search roadmaps..." onkeyup="performSearch()" />
            <button onclick="performSearch()" id="searchBtn">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <div id="myDIV">
        <h1><?php echo $welcomeMessage; ?></h1>
        <p>At SkillRoute, we’re here to guide you on your journey to success. Explore comprehensive, step-by-step career roadmaps designed to help you navigate your professional path with ease. Whether you’re just starting out or looking to advance in your career, we provide curated resources and learning tools to support your growth.</p>
   </div> </div>

    <section class="roadmap-section">
        <h2>Role Based Roadmaps</h2>
        <div class="roadmap-container">
            <!-- <div class="roadmap-card">
                    <img src="Front-End-Developer-Roadmap.webp" alt="Front-End Developer Roadmap">
                
                    <h3 onclick="window.location.href='index3.html'">Front-End Developer Roadmap</h3>
            </div> -->
          
            <?php
              include("config.php");

                // Query to select all images from the table
                $query = "SELECT * FROM curriculam where roadmap ='Role Based Roadmaps'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    // Retrieve the image data
                    $title = $row['title'];
                    $image = $row['image'];
                    $path = $row['path'];
                    $id = $row['id'];
                    $encodedTitle = urlencode($title);
                    echo '<div class="roadmap-card">
                            <img src="' . $image . '" alt="Front-End Developer Roadmap">
                        
                            <a href="' . $path . '?title=' . $encodedTitle . '"><h3>' . htmlspecialchars($title) . '</h3></a>
                        </div>';


                  
                  }
                } else {
                  echo 'No images found in the table.';
                }
              

              $conn->close();
            ?>
            <!-- <div class="roadmap-card">
                <img src="Backend-Developer-Roadmap-copy.webp" alt="Backend Developer Roadmap">
                <h3 onclick="window.location.href='backend.html'">Backend Developer Roadmap</h3>
            </div>
            <div class="roadmap-card">
                <img src="Full-Stack-Developer-Roadmap.webp" alt="Full Stack Web Developer Roadmap">
                <h3 onclick="window.location.href='fullstack.html'">Full Stack Web Developer Roadmap</h3>
            </div>
            <div class="roadmap-card">
                <img src="androidrd.png" alt="Android Developer Roadmap">
                <h3 onclick="window.location.href='android.html'">Android Developer Roadmap</h3>
            </div>
            <div class="roadmap-card">
                <img src="iosrd.png" alt="ios Developer Roadmap">
                <h3 onclick="window.location.href='ios.html'">Ios Developer Roadmap</h3>
            </div>
            <div class="roadmap-card">
                <img src="aird.webp" alt="AIML Developer Roadmap">
                <h3 onclick="window.location.href='ai.html'">AIML Stack Web Developer Roadmap</h3>
            </div>
            <div class="roadmap-card">
                <img src="cloudrd.webp" alt="cloud engineer Roadmap">
                <h3 onclick="window.location.href='cloud.html'"> cloud engineer Roadmap</h3>
            </div> -->
        </div>
    </section>
    <section class="roadmap-section">
        <h2>Skill Based Roadmaps</h2>
        <div class="roadmap-container">
            <?php
             include("config.php");

             // Query to select all images from the table
             $query = "SELECT * FROM curriculam where roadmap ='Skill Based Roadmaps'";
             $result = $conn->query($query);
             if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                 // Retrieve the image data
                 $title = $row['title'];
                 $image = $row['image'];
                 $path = $row['path'];
                 $id = $row['id'];
                 $encodedTitle = urlencode($title);
                 echo '<div class="roadmap-card">
                         <img src="' . $image . '" alt="Front-End Developer Roadmap">
                     
                         <a href="' . $path . '?title=' . $encodedTitle . '"><h3>' . htmlspecialchars($title) . '</h3></a>
                     </div>';


               
               }
             } else {
               echo 'No images found in the table.';
             }
           

           $conn->close();
            ?>
        
        </div>
    </section>
    <section class="roadmap-section">
        <h2>project ideas</h2>
        <div class="roadmap-container">
        <?php
             include("config.php");

             // Query to select all images from the table
             $query = "SELECT * FROM curriculam where roadmap ='project ideas'";
             $result = $conn->query($query);
             if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                 // Retrieve the image data
                 $title = $row['title'];
                 $image = $row['image'];
                 $path = $row['path'];
                 $id = $row['id'];
                 $encodedTitle = urlencode($title);
                 echo '<div class="roadmap-card">
                         <img src="' . $image . '" alt="projects">
                     
                         <a href="' . $path . '?title=' . $encodedTitle . '"><h3>' . htmlspecialchars($title) . '</h3></a>
                     </div>';


               
               }
             } else {
               echo 'No images found in the table.';
             }
           

           $conn->close();
            ?>

           <!-- <div class="roadmap-card">
                <img src="c++pro.avif" alt="C++ Developer Roadmap">
                <h3>C++ projects</h3>
            </div>
            <div class="roadmap-card">
                <img src="pythonpro.png" alt="Python Developer Roadmap">
                <h3>Python projects</h3>
            </div>
            <div class="roadmap-card">
                <img src="javapro.webp" alt="Java Developer Roadmap">
                <h3>Java projects</h3>
            </div>-->
            <!-- Duplicate the roadmap cards for better scrolling experience -->
            <!--<div class="roadmap-card">
                <img src="jspro.jpg" alt="C++ Developer Roadmap">
                <h3>javascript projects</h3>
            </div>
            <div class="roadmap-card">
                <img src="htmlpro.png" alt="Python Developer Roadmap">
                <h3>html projects</h3>
            </div>
            <div class="roadmap-card">
                <img src="csspro.webp" alt="Java Developer Roadmap">
                <h3>css projects</h3>
            </div>
            <div class="roadmap-card">
                <img src="androidpro.png" alt="Java Developer Roadmap">
                <h3>Android projects</h3>
            </div>
            -->
        </div>
    </section>
    <section class="faq-section">
    <h2>Frequently Asked Questions</h2>
    <div class="faq">
        <input type="checkbox" id="faq1">
        <label for="faq1">What is SkillRoute?</label>
        <div class="faq-text">
            <p>SkillRoute is a platform that offers curated career roadmaps, guides, and resources to help you in your professional journey.</p>
        </div>
    </div>
    <div class="faq">
        <input type="checkbox" id="faq2">
        <label for="faq2">How can I get started?</label>
        <div class="faq-text">
            <p>Simply browse the roadmaps, choose your desired role or skill, and start following the learning path step-by-step.</p>
        </div>
    </div>
    <div class="faq">
        <input type="checkbox" id="faq3">
        <label for="faq3">Are the resources free?</label>
        <div class="faq-text">
            <p>Yes, many resources are free! Some premium resources are also available for enhanced learning.</p>
        </div>
    </div>
    <div class="faq">
        <input type="checkbox" id="faq4">
        <label for="faq4">Can I suggest new roadmaps?</label>
        <div class="faq-text">
            <p>Yes, we welcome suggestions! Feel free to contact us with any ideas or requests for new roadmaps.</p>
        </div>
    </div>
</section>

    <footer>
      <p>© 2024 SKILLROUTE- a roadmap web</p>
      <p>
        <a href="newsletter.html">Subscribe to our Newsletter</a> | 
        Follow us on: 
        <a href="https://github.com/">Github</a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=tharun16c@gmail.com&su=Query from Website" target="_blank">Contact Us</a>
      </p>
    </footer>


</body>
</html>






