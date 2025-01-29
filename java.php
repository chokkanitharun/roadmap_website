<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Java Developer Roadmap</title>
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
        <h1>Java Developer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="java1.php?title=<?php echo urlencode($title); ?>&sub=Core Java Basics">
        <div class="roadmap-step">
            <h2>1. Core Java Basics</h2>
            <p>Learn Java syntax, data types, variables, operators, and control structures. Get comfortable with writing basic Java programs.</p>
        </div></a>
        <a href="java2.php?title=<?php echo urlencode($title); ?>&sub=Object-Oriented Programming">
        <div class="roadmap-step">
            <h2>2. Object-Oriented Programming (OOP)</h2>
            <p>Master OOP concepts in Java, including classes, objects, inheritance, polymorphism, encapsulation, and abstraction.</p>
        </div></a>
        <a href="java3.php?title=<?php echo urlencode($title); ?>&sub=Java Collections Framework">
        <div class="roadmap-step">
            <h2>3. Java Collections Framework</h2>
            <p>Learn about Java Collections (List, Set, Map, Queue) and understand their uses and performance differences.</p>
        </div></a>
        <a href="java4.php?title=<?php echo urlencode($title); ?>&sub=Exception Handling">
        <div class="roadmap-step">
            <h2>4. Exception Handling</h2>
            <p>Understand how to handle exceptions using try-catch, custom exceptions, and best practices for robust error handling.</p>
        </div></a>
        <a href="java5.php?title=<?php echo urlencode($title); ?>&sub=File I/O and Serialization">
        <div class="roadmap-step">
            <h2>5. File I/O and Serialization</h2>
            <p>Learn to read from and write to files, handle input/output streams, and use serialization for data storage.</p>
        </div></a>
        <a href="java6.php?title=<?php echo urlencode($title); ?>&sub=Multithreading and Concurrency">
        <div class="roadmap-step">
            <h2>6. Multithreading and Concurrency</h2>
            <p>Understand threads, synchronization, and concurrency in Java to build scalable, high-performance applications.</p>
        </div></a>
        <a href="java7.php?title=<?php echo urlencode($title); ?>&sub=Java Streams and Lambda Expressions">
        <div class="roadmap-step">
            <h2>7. Java Streams and Lambda Expressions</h2>
            <p>Get familiar with Java Streams, lambda expressions, and functional programming to write efficient, readable code.</p>
        </div></a>
        <a href="java8.php?title=<?php echo urlencode($title); ?>&sub=Spring Framework">
        <div class="roadmap-step">
            <h2>8. Spring Framework</h2>
            <p>Learn the basics of the Spring Framework for dependency injection, web development, and building REST APIs.</p>
        </div></a>
        <a href="java9.php?title=<?php echo urlencode($title); ?>&sub=Database Access">
        <div class="roadmap-step">
            <h2>9. Database Access (JDBC/Hibernate)</h2>
            <p>Understand JDBC for database connection and ORM frameworks like Hibernate for database management in Java applications.</p>
        </div></a>
        <a href="java10.php?title=<?php echo urlencode($title); ?>&sub=Testing and Debugging">
        <div class="roadmap-step">
            <h2>10. Testing and Debugging</h2>
            <p>Master unit testing with JUnit, mock testing, and debugging techniques for ensuring reliable, bug-free code.</p>
        </div></a>
        <a href="java11.php?title=<?php echo urlencode($title); ?>&sub=Build Tools and Version Control">
        <div class="roadmap-step">
            <h2>11. Build Tools and Version Control</h2>
            <p>Learn to use build tools like Maven and Gradle, and version control with Git for managing dependencies and collaborating on projects.</p>
        </div></a>
        <a href="java12.php?title=<?php echo urlencode($title); ?>&sub=Deployment and CI/CD">
        <div class="roadmap-step">
            <h2>12. Deployment and CI/CD</h2>
            <p>Understand deployment with Docker, cloud services, and CI/CD pipelines for automating build, test, and deployment processes.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 Java Developer Roadmap</p>
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
    
    doc.save('java-development-roadmap.pdf');
}
</script>
</body>
</html>
