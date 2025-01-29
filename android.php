<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Android Development Roadmap (Kotlin)</title>
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
        <h1>Android Developer Roadmap (Kotlin)</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
    <a href="LKB.php?title=<?php echo urlencode($title); ?>&sub=Learn Kotlin Basics">
        <div class="roadmap-step">
            <h2>1. Learn Kotlin Basics</h2>
            <p>Start with the fundamentals of Kotlin, covering syntax, data types, control structures, and functions.</p>
        </div></a>
        <a href="UAS.php?title=<?php echo urlencode($title); ?>&sub=Understand Android Studio">
        <div class="roadmap-step">
            <h2>2. Understand Android Studio</h2>
            <p>Get comfortable with Android Studio, the official IDE for Android development, and learn project setup, emulators, and basic tools.</p>
        </div></a>
        <a href="MAF.php?title=<?php echo urlencode($title); ?>&sub=Master Android Fundamentals">
        <div class="roadmap-step">
            <h2>3. Master Android Fundamentals</h2>
            <p>Learn about activities, fragments, views, layouts, and the lifecycle of Android components.</p>
        </div></a>
        <a href="LAUD.php?title=<?php echo urlencode($title); ?>&sub=Layouts and UI Design">
        <div class="roadmap-step">
            <h2>4. Layouts and UI Design</h2>
            <p>Understand XML layouts, design principles, and the use of ConstraintLayout, LinearLayout, and other layout types.</p>
        </div></a>
        <a href="NAI.php?title=<?php echo urlencode($title); ?>&sub=Navigation and Intents">
        <div class="roadmap-step">
            <h2>5. Navigation and Intents</h2>
            <p>Learn how to navigate between screens, use intents to pass data, and work with the Android Navigation component.</p>
        </div></a>
        <a href="DP.php?title=<?php echo urlencode($title); ?>&sub=Data Persistence">
        <div class="roadmap-step">
            <h2>6. Data Persistence</h2>
            <p>Understand storing data locally with Room, SharedPreferences, and SQLite databases.</p>
        </div></a>
        <a href="networkapiandroid.php?title=<?php echo urlencode($title); ?>&sub=Networking and APIs">
        <div class="roadmap-step">
            <h2>7. Networking and APIs</h2>
            <p>Learn to connect to REST APIs using libraries like Retrofit and handle JSON data with Gson or Moshi.</p>
        </div></a>
        <a href="DependencyInjection.php?title=<?php echo urlencode($title); ?>&sub=Dependency Injection">
        <div class="roadmap-step">
            <h2>8. Dependency Injection</h2>
            <p>Explore dependency injection with Dagger or Hilt to write modular, testable code.</p>
        </div></a>
        <a href="MVVM.php?title=<?php echo urlencode($title); ?>&sub=MVVM Architecture">
        <div class="roadmap-step">
            <h2>9. MVVM Architecture</h2>
            <p>Implement Model-View-ViewModel (MVVM) architecture to separate concerns and manage data effectively in Android apps.</p>
        </div></a>
        <a href="androidTD.php?title=<?php echo urlencode($title); ?>&sub=Testing and Debugging">
        <div class="roadmap-step">
            <h2>10. Testing and Debugging</h2>
            <p>Learn to test Android applications using JUnit, Espresso, and Robolectric, and become proficient in debugging.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 Android Roadmap</p>
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
    
    doc.save('android-development-roadmap.pdf');
}
</script>
</body>
</html>
