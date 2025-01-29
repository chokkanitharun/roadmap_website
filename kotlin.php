<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Kotlin Developer Roadmap</title>
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
        <h1>Kotlin Developer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="kotlin1.php?title=<?php echo urlencode($title); ?>&sub=Kotlin Basics">
        <div class="roadmap-step">
            <h2>1. Kotlin Basics</h2>
            <p>Understand the basics of Kotlin, including syntax, variables, data types, and basic functions.</p>
        </div></a>
        <a href="kotlin2.php?title=<?php echo urlencode($title); ?>&sub=Control Flow">
        <div class="roadmap-step">
            <h2>2. Control Flow</h2>
            <p>Learn control flow statements in Kotlin, including conditionals, loops, and ranges.</p>
        </div></a>
        <a href="kotlin3.php?title=<?php echo urlencode($title); ?>&sub=Object-Oriented Programming">
        <div class="roadmap-step">
            <h2>3. Object-Oriented Programming (OOP)</h2>
            <p>Master OOP concepts like classes, inheritance, polymorphism, and interfaces in Kotlin.</p>
        </div></a>
        <a href="kotlin4.php?title=<?php echo urlencode($title); ?>&sub=Functions and Lambdas">
        <div class="roadmap-step">
            <h2>4. Functions and Lambdas</h2>
            <p>Get comfortable with functions, higher-order functions, and lambdas in Kotlin.</p>
        </div></a>
        <a href="kotlin5.php?title=<?php echo urlencode($title); ?>&sub=Collections and Data Manipulation">
        <div class="roadmap-step">
            <h2>5. Collections and Data Manipulation</h2>
            <p>Explore Kotlin’s collection types, such as lists, sets, maps, and learn data manipulation techniques.</p>
        </div></a>
        <a href="kotlin6.php?title=<?php echo urlencode($title); ?>&sub=Coroutines and Asynchronous Programming">
        <div class="roadmap-step">
            <h2>6. Coroutines and Asynchronous Programming</h2>
            <p>Understand Kotlin coroutines for asynchronous programming and managing concurrent tasks.</p>
        </div></a>
        <a href="kotlin7.php?title=<?php echo urlencode($title); ?>&sub=Exception Handling">
        <div class="roadmap-step">
            <h2>7. Exception Handling</h2>
            <p>Learn how to handle exceptions and errors effectively to create robust applications.</p>
        </div></a>
        <a href="kotlin8.php?title=<?php echo urlencode($title); ?>&sub=Android Development with Kotlin">
        <div class="roadmap-step">
            <h2>8. Android Development with Kotlin</h2>
            <p>Explore Android development fundamentals using Kotlin, including layouts, activities, and UI elements.</p>
        </div></a>
        <a href="kotlin9.php?title=<?php echo urlencode($title); ?>&sub=Dependency Injection">
        <div class="roadmap-step">
            <h2>9. Dependency Injection</h2>
            <p>Learn about dependency injection using libraries like Dagger or Hilt to manage dependencies in your projects.</p>
        </div></a>
        <a href="kotlin10.php?title=<?php echo urlencode($title); ?>&sub=Networking and APIs">
        <div class="roadmap-step">
            <h2>10. Networking and APIs</h2>
            <p>Understand networking in Kotlin with libraries like Retrofit or Ktor to connect applications with APIs.</p>
        </div></a>
        <a href="kotlin11.php?title=<?php echo urlencode($title); ?>&sub=Testing in Kotlin">
        <div class="roadmap-step">
            <h2>11. Testing in Kotlin</h2>
            <p>Learn testing techniques using JUnit and other tools to write unit and integration tests for your Kotlin applications.</p>
        </div></a>
        <a href="kotlin12.php?title=<?php echo urlencode($title); ?>&sub=Advanced Kotlin Features">
        <div class="roadmap-step">
            <h2>12. Advanced Kotlin Features</h2>
            <p>Dive into advanced topics like inline functions, type-safe builders, DSL, and extension functions.</p>
        </div></a>
        <a href="kotlin13.php?title=<?php echo urlencode($title); ?>&sub=Deployment">
        <div class="roadmap-step">
            <h2>13. Deployment</h2>
            <p>Learn to package and deploy your Kotlin applications, whether on Android, backend servers, or cloud platforms.</p>
        </div></a>
    </section>
    <footer>
        <p>©  Kotlin Developer Roadmap</p>
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
    
    doc.save('javascript-development-roadmap.pdf');
}
</script>
</body>
</html>
