<?php

    $title = $_GET['title'];
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Backend Development Roadmap</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }
        a {
            text-decoration: underline ;
            color: white;
            font-weight: bold;
            font-size:30px;
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
    <h3 class=><a href="index.php">Home</a></h3>
        <h1>Backend Development Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="node.php?title=<?php echo urlencode($title); ?>&sub=Learn a Backend Programming Language">
        <div class="roadmap-step">
            <h2>1. Learn a Backend Programming Language</h2>
            <p>Start with languages like JavaScript (Node.js), Python, Java, Ruby, or PHP.</p>
        </div></a>
        <a href="udb.php?title=<?php echo urlencode($title); ?>&sub=Understand Databases">
        <div class="roadmap-step">
            <h2>2. Understand Databases</h2>
            <p>Learn about relational databases (e.g., MySQL, PostgreSQL) and NoSQL databases (e.g., MongoDB).</p>
        </div></a>
        <a href="learnapi.php?title=<?php echo urlencode($title); ?>&sub=Learn about APIs">
        <div class="roadmap-step">
            <h2>3. Learn about APIs</h2>
            <p>Understand RESTful APIs and GraphQL for communication between server and client.</p>
        </div></a>
        <a href="smd.php?title=<?php echo urlencode($title); ?>&sub=Server Management and  Deployment">
        <div class="roadmap-step">
            <h2>4. Server Management and Deployment</h2>
            <p>Get familiar with server management, hosting, and deployment services like AWS, Heroku, or DigitalOcean.</p>
        </div></a>
        <a href="AA.php?title=<?php echo urlencode($title); ?>&sub=Authentication and Authorization">
        <div class="roadmap-step">
            <h2>5. Authentication and Authorization</h2>
            <p>Learn about security concepts like JWT, OAuth, and secure password storage to protect applications.</p>
        </div></a>
        <a href="FL.php?title=<?php echo urlencode($title); ?>&sub=Frameworks and Libraries">
        <div class="roadmap-step">
            <h2>6. Frameworks and Libraries</h2>
            <p>Explore backend frameworks like Express for Node.js, Django for Python, Spring for Java, or Ruby on Rails.</p>
        </div></a>

        <a href="MA.php?title=<?php echo urlencode($title); ?>&sub=Microservices and Architecture">
        <div class="roadmap-step">
            <h2>7. Microservices and Architecture</h2>
            <p>Understand microservices, monolithic architecture, and how to design scalable applications.</p>
        </div></a>
        <a href="CPO.php?title=<?php echo urlencode($title); ?>&sub=Caching and Performance Optimization">
        <div class="roadmap-step">
            <h2>8. Caching and Performance Optimization</h2>
            <p>Learn about caching (Redis, Memcached) and techniques for optimizing backend performance.</p>
        </div></a>
        <a href="TD.php?title=<?php echo urlencode($title); ?>&sub=Testing and Debugging">
        <div class="roadmap-step">
            <h2>9. Testing and Debugging</h2>
            <p>Implement unit, integration, and end-to-end testing to ensure the reliability of backend code.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 Backend Roadmap</p>
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
    
    doc.save('backend-development-roadmap.pdf');
}
</script>
</body>
</html>
