<?php

    $title = $_GET['title'];
    $sub = $_GET['sub'];

    include("config.php");

    $query = "SELECT * FROM curriculamlist WHERE title = '$title' AND sub = '$sub'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
     
            $title = $row['title'];
            $sub = $row['sub'];
            $abeginner = $row['abeginner'];  
            $id = $row['id'];
            $aadvance = $row['aadvance']; 
            $vbeginner= $row['vbeginner'];
            $vadvance=$row['vadvance'];
            $cbeginner=$row['cbeginner'];
            $cadvance=$row['cadvance'];

            function parseLinks($links) {
                $linksArray = [];
                $linkPairs = explode(",", $links); 

                foreach ($linkPairs as $link) {
           
                    $parts = explode(":", $link, 2);  

                    if(count($parts) == 2) {
                        $name = trim($parts[0]);   
                        $url = trim($parts[1]);    
                        $linksArray[$name] = $url; 
                    }
                }

                return $linksArray;
            }

            $abeginnerLinks = parseLinks($abeginner);
            $aadvanceLinks = parseLinks($aadvance);
            $vbeginnerLinks=parseLinks($vbeginner);
            $vadvanceLinks=parseLinks($vadvance);
            $cbeginnerLinks=parseLinks($cbeginner);
            $cadvanceLinks=parseLinks($cadvance);
            
           
            foreach ($abeginnerLinks as $name => $url) {
                // echo "<p><a href='$url' target='_blank'>$name</a></p>";
                // echo "$url";
            }

           
            foreach ($aadvanceLinks as $name => $url) {
                // echo "<p><a href='$url' target='_blank'>$name</a></p>";
                // echo "$url";
            }
            foreach ($vbeginnerLinks as $name => $url) {
                // echo "<p><a href='$url' target='_blank'>$name</a></p>";
                // echo "$url";
            }
            foreach ($vadvanceLinks as $name => $url) {
                // echo "<p><a href='$url' target='_blank'>$name</a></p>";
                // echo "$url";
            }

            foreach ($cbeginnerLinks as $name => $url) {
                // echo "<p><a href='$url' target='_blank'>$name</a></p>";
                // echo "$url";
            }
            foreach ($cadvanceLinks as $name => $url) {
                // echo "<p><a href='$url' target='_blank'>$name</a></p>";
                // echo "$url";
            }
        }
    } else {
        echo 'No Data Found';
    }

    $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Route - Functions and Lambdas</title>
    <style>
        /* Your styling remains unchanged */
         /* Your styling remains unchanged */
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        a{
            text-decoration: none;
        }

        /* General body styling */
        body, html {
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Header styling */
        .header {
            width: 100%;
            background-color: #d9534f;
            color: white;
            padding: 15px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-title {
            font-size: 24px;
            font-weight: bold;
        }

        /* Top-right icon container */
        .header-icons {
            position: absolute;
            right: 20px;
            display: flex;
            gap: 15px;
        }

        .header-icons img {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        /* Content styling */
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-top: 70px;
        }

        /* Icon container styling */
        .content-container {
            background-color: white;
            width: 80%;
            height: 80%;
            max-width: 800px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            text-align: center;
        }

        /* Icon styling */
        .icon {
            font-size: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #333;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .icon:hover {
            transform: scale(1.1);
        }

        .icon img {
            width: 80px;
            height: 80px;
            margin-bottom: 5px;
        }

        .icon-text {
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }

        /* Sidebar (Slider) styling */
        .slider {
            position: fixed;
            top: 0;
            right: -100%; /* Hidden initially */
            width: 300px;
            height: 100%;
            background-color: #ffffff;
            box-shadow: -3px 0 5px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease;
            z-index: 3;
            padding: 20px;
            overflow-y: auto;
            border-left: 2px solid #d9534f;
        }

        .slider.active {
            right: 0; /* Slide in */
        }

        .slider-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #d9534f;
            text-align: center;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
        }

        .close-slider {
            font-size: 16px;
            color: #333;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .note {
            font-size: 12px;
            color: #888;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            background-color: #f2f2f2;
            padding: 5px 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .resource-link {
            display: block;
            margin: 5px 0;
            padding: 8px;
            color: white;
            background-color: #999;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
        }

        .resource-link:hover {
            background-color: #f01010;
        }

        .beginner-section .resource-link {
            background-color: #8bc34a; /* Light green for beginner links */
        }

        .advanced-section .resource-link {
            background-color: #ff9800; /* Orange for advanced links */
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="header-title">Functions and Lambdas</div>
        <div class="header-icons">
            <img src="close-icon.png" alt="Close" onclick="closePage()">
            <img src="chat-icon.png" alt="Chat" onclick="openChat()">
        </div>
    </div>

    <!-- Content Wrapper to center content vertically and horizontally -->
    <div class="content-wrapper">
        <div class="content-container">
            <!-- Icon Items -->
            <div class="icon" onclick="openSlider('Articles')">
                <img src="article.png" alt="Articles">
                <div class="icon-text">ARTICLES</div>
            </div>

            <div class="icon" onclick="openSlider('Video Tutorials')">
                <img src="video.png" alt="Video Tutorials">
                <div class="icon-text">VIDEO TUTORIALS</div>
            </div>

            <div class="icon" onclick="openSlider('Free Online Courses')">
                <img src="course.jpg" alt="Free Online Courses">
                <div class="icon-text">FREE ONLINE COURSES</div>
            </div>

            <!-- Make a Note Icon -->
            <div class="icon" onclick="makeNote()">
                <img src="notes.png" alt="Make a Note">
                <div class="icon-text">MAKE A NOTE</div>
            </div>
        </div>
    </div>

    <!-- Slider Panel -->
    <div id="slider" class="slider">
        <span class="close-slider" onclick="closeSlider()">✖</span>
        <div id="sliderHeader" class="slider-header">Resources</div>
        <div class="note">Note: The links provided are free; additional research is recommended for comprehensive learning.</div>

        <!-- Articles Section -->
        <div id="articles" class="slider-section">
            <div class="section-title">FOR BEGINNERS</div>

<?php
    foreach ($abeginnerLinks as $name => $url) {
        echo '
            <a href="' . $url . '" target="_blank" class="resource-link">' . $name . '</a>
        ';
    }
?>

<div class="section-title">FOR ADVANCED</div>

<?php
    foreach ($aadvanceLinks as $name => $url) {
        echo '
            <a href="' . $url . '" target="_blank" class="resource-link">' . $name . '</a>
        ';
    }
?>
            <!--<div class="section-title">FOR BEGINNERS</div>
            <a href="https://kotlinlang.org/docs/functions.html" target="_blank" class="resource-link">Kotlin Official - Functions</a>
            <a href="https://www.geeksforgeeks.org/functions-in-kotlin/" target="_blank" class="resource-link">GeeksforGeeks - Functions in Kotlin</a>
            <a href="https://www.javatpoint.com/kotlin-functions" target="_blank" class="resource-link">JavaTPoint - Functions in Kotlin</a>

            <div class="section-title">FOR ADVANCED</div>
            <a href="https://medium.com/@deepakjadhav_51102/higher-order-functions-in-kotlin-c684e3fd7098" target="_blank" class="resource-link">Medium - Higher-Order Functions in Kotlin</a>
            <a href="https://proandroiddev.com/mastering-kotlin-lambdas-and-higher-order-functions-cf53bbef5747" target="_blank" class="resource-link">ProAndroidDev - Mastering Kotlin Lambdas and Higher-Order Functions</a>
            <a href="https://www.udemy.com/course/advanced-kotlin-programming/" target="_blank" class="resource-link">Udemy - Advanced Kotlin Programming</a>
        --></div>

        <!-- Video Resources Section -->
        <div id="videos" class="slider-section" style="display: none;">
            <div class="section-title">FOR BEGINNERS</div>
    
            <?php
                foreach ($vbeginnerLinks as $name => $url) {
                    echo '
                        <a href="' . $url . '" target="_blank" class="resource-link">' . $name . '</a>
                    ';
                }
            ?>
            
            <div class="section-title">FOR ADVANCED</div>
            
            <?php
                foreach ($vadvanceLinks as $name => $url) {
                    echo '
                        <a href="' . $url . '" target="_blank" class="resource-link">' . $name . '</a>
                    ';
                }
            ?>
            <!--<div class="section-title">Video Resources for Beginners</div>
            <a href="https://www.youtube.com/watch?v=VqH5V_tqzTk" target="_blank" class="resource-link">Kotlin Functions Basics</a>
            <a href="https://www.youtube.com/watch?v=g9QXyn-OTw8" target="_blank" class="resource-link">Learn Functions in Kotlin</a>
            <a href="https://www.youtube.com/watch?v=KPJ6BGOF2bg" target="_blank" class="resource-link">Understanding Kotlin Lambdas</a>

            <div class="section-title">Video Resources for Advanced</div>
            <a href="https://www.youtube.com/watch?v=GiqZci9N98I" target="_blank" class="resource-link">Advanced Kotlin Functions and Lambdas</a>
            <a href="https://www.youtube.com/watch?v=eXG_n6uGrww" target="_blank" class="resource-link">Kotlin Higher-Order Functions Tutorial</a>
            <a href="https://www.youtube.com/watch?v=pXUsyMO8ssY" target="_blank" class="resource-link">Master Kotlin Functions and Lambdas</a>
        --></div>

        <!-- Course Resources Section -->
        <div id="courses" class="slider-section" style="display: none;">
            <div class="section-title">FOR BEGINNERS</div>

            <?php
                foreach ($cbeginnerLinks as $name => $url) {
                    echo '
                        <a href="' . $url . '" target="_blank" class="resource-link">' . $name . '</a>
                    ';
                }
            ?>
            
            <div class="section-title">FOR ADVANCED</div>
            
            <?php
                foreach ($cadvanceLinks as $name => $url) {
                    echo '
                        <a href="' . $url . '" target="_blank" class="resource-link">' . $name . '</a>
                    ';
                }
            ?>
            <!--<div class="section-title">Course Resources for Beginners</div>
            <a href="https://www.udemy.com/course/kotlin-for-beginners/" target="_blank" class="resource-link">Udemy - Kotlin for Beginners</a>
            <a href="https://www.codecademy.com/learn/learn-kotlin" target="_blank" class="resource-link">Codecademy - Learn Kotlin</a>
            <a href="https://www.coursera.org/learn/kotlin-for-java-developers" target="_blank" class="resource-link">Coursera - Kotlin for Java Developers</a>

            <div class="section-title">Course Resources for Advanced</div>
            <a href="https://frontendmasters.com/courses/kotlin/" target="_blank" class="resource-link">Frontend Masters - Advanced Kotlin</a>
            <a href="https://www.udemy.com/course/kotlin-advanced-programming/" target="_blank" class="resource-link">Udemy - Kotlin Advanced Programming</a>
            <a href="https://www.pluralsight.com/courses/advanced-kotlin-programming" target="_blank" class="resource-link">Pluralsight - Advanced Kotlin Programming</a>
        --></div>
    </div>

    <script>
        function openSlider(section) {
            const slider = document.getElementById("slider");
            const sliderHeader = document.getElementById("sliderHeader");
            const sections = document.querySelectorAll(".slider-section");

            sections.forEach(section => section.style.display = "none");

            if (section === "Articles") {
                document.getElementById("articles").style.display = "block";
                sliderHeader.innerText = "Articles Resources";
            } else if (section === "Video Tutorials") {
                document.getElementById("videos").style.display = "block";
                sliderHeader.innerText = "Video Tutorials";
            } else if (section === "Free Online Courses") {
                document.getElementById("courses").style.display = "block";
                sliderHeader.innerText = "Free Online Courses";
            }

            slider.classList.add("active");
        }

        function closeSlider() {
            const slider = document.getElementById("slider");
            slider.classList.remove("active");
        }

        function makeNote() {
            window.location.href="notes.php";
        }

        function closePage() {
            alert("Close button clicked");
        }

        function openChat() {
            alert("Chat button clicked");
        }
    </script>
</body>
</html>
