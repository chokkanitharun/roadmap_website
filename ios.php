
<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>iOS Development Roadmap (Swift)</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a{
            text-decoration:none;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #ef4444;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        .download-btn {
    background-color: #fff;
    color: #ef4444;
    padding: 10px 20px;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}
.download-btn:hover {
    background-color: #ef4444;
    color: #fff;
}
        .roadmap-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .roadmap-step {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .roadmap-step:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .roadmap-step h2 {
            font-size: 1.5rem;
            color: #ef4444;
            margin-bottom: 10px;
        }

        .roadmap-step p {
            font-size: 1rem;
            line-height: 1.8;
            color: #555;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #ef4444;
            color: white;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>iOS Development Roadmap (Swift)</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="ios1.php?title=<?php echo urlencode($title); ?>&sub=Learn Swift Basics">
        <div class="roadmap-step">
            <h2>1. Learn Swift Basics</h2>
            <p>Start with the basics of Swift, covering syntax, data types, control structures, and functions.</p>
        </div></a>
        <a href="ios2.php?title=<?php echo urlencode($title); ?>&sub=Get Familiar with Xcode">
        <div class="roadmap-step">
            <h2>2. Get Familiar with Xcode</h2>
            <p>Understand Xcode, Apple's IDE, including interface, debugging tools, and basic project setup.</p>
        </div></a>
        <a href="ios3.php?title=<?php echo urlencode($title); ?>&sub=UIKit Fundamentals">
        <div class="roadmap-step">
            <h2>3. UIKit Fundamentals</h2>
            <p>Learn UIKit components like views, labels, buttons, and essential UI elements.</p>
        </div></a>
        <a href="ios4.php?title=<?php echo urlencode($title); ?>&sub=SwiftUI Basics">
        <div class="roadmap-step">
            <h2>4. SwiftUI Basics</h2>
            <p>Explore SwiftUI to build modern, declarative UI layouts for iOS apps.</p>
        </div></a>
        <a href="ios5.php?title=<?php echo urlencode($title); ?>&sub=View Controllers and Navigation">
        <div class="roadmap-step">
            <h2>5. View Controllers and Navigation</h2>
            <p>Understand view controllers, navigation, and passing data between screens.</p>
        </div></a>
        <a href="ios6.php?title=<?php echo urlencode($title); ?>&sub=Data Persistence">
        <div class="roadmap-step">
            <h2>6. Data Persistence</h2>
            <p>Learn Core Data, UserDefaults, and File Management for storing data locally on iOS.</p>
        </div></a>
        <a href="ios7.php?title=<?php echo urlencode($title); ?>&sub=Networking with URLSession and APIs">
        <div class="roadmap-step">
            <h2>7. Networking with URLSession and APIs</h2>
            <p>Use URLSession to connect with REST APIs and handle JSON data in iOS apps.</p>
        </div></a>
        <a href="ios8.php?title=<?php echo urlencode($title); ?>&sub=Combine Framework">
        <div class="roadmap-step">
            <h2>8. Combine Framework</h2>
            <p>Learn the Combine framework for handling asynchronous programming and reactive data streams.</p>
        </div></a>
        <a href="ios9.php?title=<?php echo urlencode($title); ?>&sub=Swift Package Manager and CocoaPods">
        <div class="roadmap-step">
            <h2>9. Swift Package Manager and CocoaPods</h2>
            <p>Explore dependency management tools like Swift Package Manager and CocoaPods for libraries.</p>
        </div></a>
        <a href="ios10.php?title=<?php echo urlencode($title); ?>&sub=Testing and Debugging">
        <div class="roadmap-step">
            <h2>10. Testing and Debugging</h2>
            <p>Learn testing techniques with XCTest and debugging tools in Xcode to ensure app stability.</p>
        </div></a>
    </section>
    <footer>
        <p>© iOS Roadmap</p>
    </footer>
    <script>
        function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    const title = document.querySelector("header h1").textContent;
    const steps = document.querySelectorAll(".roadmap-step");
    let yOffset = 20;
    
    doc.setFontSize(16);
    doc.text(title, 20, yOffset);
    yOffset += 10;
    
    steps.forEach((step, index) => {
        const stepTitle = step.querySelector("h2").textContent;
        const stepDescription = step.querySelector("p").textContent;
        
        doc.setFontSize(12);
        doc.text(`${index + 1}. ${stepTitle}`, 20, yOffset);
        yOffset += 10;
        doc.text(stepDescription, 20, yOffset);
        yOffset += 20;
    });
    
    doc.save('ios-development-roadmap.pdf');
}
</script>
</body>
</html>
