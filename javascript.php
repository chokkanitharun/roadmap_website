<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>JavaScript Developer Roadmap</title>
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
        <h1>JavaScript Developer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
    <a href="js1.php?title=<?php echo urlencode($title); ?>&sub=JavaScript Basics">
        <div class="roadmap-step">
            <h2>1. JavaScript Basics</h2>
            <p>Learn the fundamentals of JavaScript, including variables, data types, operators, and basic syntax.</p>
        </div></a>
        <a href="js2.php?title=<?php echo urlencode($title); ?>&sub=DOM Manipulation"> 
        <div class="roadmap-step">
            <h2>2. DOM Manipulation</h2>
            <p>Understand how to interact with the Document Object Model (DOM) to dynamically change HTML content and styles.</p>
        </div></a>
        <a href="js3.php?title=<?php echo urlencode($title); ?>&sub=JavaScript ES6 Features">
        <div class="roadmap-step">
            <h2>3. JavaScript ES6+ Features</h2>
            <p>Learn modern JavaScript features like arrow functions, destructuring, promises, async/await, and modules.</p>
        </div></a>
        <a href="js4.php?title=<?php echo urlencode($title); ?>&sub=JavaScript Events">
        <div class="roadmap-step">
            <h2>4. JavaScript Events</h2>
            <p>Understand how to handle events like clicks, keypresses, and form submissions to create interactive applications.</p>
        </div></a>
        <a href="js5.php?title=<?php echo urlencode($title); ?>&sub=Asynchronous JavaScript">
        <div class="roadmap-step">
            <h2>5. Asynchronous JavaScript</h2>
            <p>Master asynchronous programming concepts with callbacks, promises, async/await, and API calls using Fetch or Axios.</p>
        </div></a>
        <a href="js6.php?title=<?php echo urlencode($title); ?>&sub=Error Handling and Debugging">
        <div class="roadmap-step">
            <h2>6. Error Handling and Debugging</h2>
            <p>Learn error handling and debugging techniques to ensure smooth application functionality and troubleshoot issues.</p>
        </div></a>
        <a href="js7.php?title=<?php echo urlencode($title); ?>&sub=JavaScript Frameworks">
        <div class="roadmap-step">
            <h2>7. JavaScript Frameworks (React, Vue, or Angular)</h2>
            <p>Get familiar with popular JavaScript frameworks like React, Vue, or Angular to build complex and responsive UIs.</p>
        </div></a>
        <a href="js8.php?title=<?php echo urlencode($title); ?>&sub=State Management">
        <div class="roadmap-step">
            <h2>8. State Management</h2>
            <p>Learn about state management techniques with Redux, Vuex, or React Context to handle application-wide states efficiently.</p>
        </div></a>
        <a href="js9.php?title=<?php echo urlencode($title); ?>&sub=Testing JavaScript Applications">
        <div class="roadmap-step">
            <h2>9. Testing JavaScript Applications</h2>
            <p>Understand unit and integration testing using tools like Jest, Mocha, and Cypress to ensure code reliability.</p>
        </div></a>
        <a href="js10.php?title=<?php echo urlencode($title); ?>&sub=Node.js and Backend Basics">
        <div class="roadmap-step">
            <h2>10. Node.js and Backend Basics</h2>
            <p>Learn the basics of backend development using Node.js, including Express.js for building APIs and handling server logic.</p>
        </div></a>
        <a href="js11.php?title=<?php echo urlencode($title); ?>&sub=Deployment and CI/CD">
        <div class="roadmap-step">
            <h2>11. Deployment and CI/CD</h2>
            <p>Understand how to deploy JavaScript applications using platforms like Vercel or Heroku, and CI/CD pipelines for automation.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 JavaScript Developer Roadmap</p>
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
