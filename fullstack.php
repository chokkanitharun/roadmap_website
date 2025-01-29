<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Full Stack Development Roadmap</title>
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
        <h1>Full Stack Development Roadmap (JavaScript)</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
    <a href="full1.php?title=<?php echo urlencode($title); ?>&sub=HTML and CSS Basics">
        <div class="roadmap-step">
            <h2>1. HTML and CSS Basics</h2>
            <p>Start with HTML for structure and CSS for styling to build foundational front-end skills.</p>
        </div></a>
        <a href="full2.php?title=<?php echo urlencode($title); ?>&sub=JavaScript Fundamentals">
        <div class="roadmap-step">
            <h2>2. JavaScript Fundamentals</h2>
            <p>Learn JavaScript basics including syntax, data types, functions, and DOM manipulation.</p>
        </div></a>
        <a href="full3.php?title=<?php echo urlencode($title); ?>&sub=Version Control with Git">
        <div class="roadmap-step">
            <h2>3. Version Control with Git</h2>
            <p>Understand Git for version control, and use platforms like GitHub to collaborate and track changes.</p>
        </div></a>
        <a href="full4.php?title=<?php echo urlencode($title); ?>&sub=Front-End Frameworks">
        <div class="roadmap-step">
            <h2>4. Front-End Frameworks</h2>
            <p>Master a front-end framework like React to build dynamic user interfaces efficiently.</p>
        </div></a>
        <a href="full5.php?title=<?php echo urlencode($title); ?>&sub=Node.js and Express">
        <div class="roadmap-step">
            <h2>5. Node.js and Express</h2>
            <p>Learn Node.js to use JavaScript on the server side, and use Express for creating APIs.</p>
        </div></a>
        <a href="full6.php?title=<?php echo urlencode($title); ?>&sub=Databases (MongoDB)">
        <div class="roadmap-step">
            <h2>6. Databases (MongoDB)</h2>
            <p>Understand databases and start with MongoDB, a NoSQL database, to manage data effectively.</p>
        </div></a>
        <a href="full7.php?title=<?php echo urlencode($title); ?>&sub=RESTful APIs and GraphQL">
        <div class="roadmap-step">
            <h2>7. RESTful APIs and GraphQL</h2>
            <p>Learn how to build and consume REST APIs, and explore GraphQL for flexible data queries.</p>
        </div></a>
        <a href="full8.php?title=<?php echo urlencode($title); ?>&sub=Authentication and Security">
        <div class="roadmap-step">
            <h2>8. Authentication and Security</h2>
            <p>Implement secure user authentication, and understand JWT and OAuth for managing access.</p>
        </div></a>
        <a href="full9.php?title=<?php echo urlencode($title); ?>&sub=Deployment and DevOps Basics">
        <div class="roadmap-step">
            <h2>9. Deployment and DevOps Basics</h2>
            <p>Learn to deploy applications using platforms like AWS, Heroku, or Vercel, and understand CI/CD basics.</p>
        </div></a>
        <a href="full10.php?title=<?php echo urlencode($title); ?>&sub=Testing and Debugging">
        <div class="roadmap-step">
            <h2>10. Testing and Debugging</h2>
            <p>Learn testing frameworks (like Jest) for both front-end and back-end, and develop debugging skills.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 Full Stack Roadmap</p>
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
