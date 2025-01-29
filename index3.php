<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend Development Roadmap</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        a{
            text-decoration:none;
        }
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

        header {
            background-color:#ef4444 ;
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
        <h1>Frontend Development Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>

    </header>
    <section class="roadmap-container">
    <a href="ht.php?title=<?php echo urlencode($title); ?>&sub=HTML%20Basics">
    <div class="roadmap-step">
            <h2>1. HTML Basics</h2>
            <p>Learn how to structure web pages using HTML tags, forms, and semantic elements.</p>
        </div>
        </a>
        <a href="cs.php?title=<?php echo urlencode($title); ?>&sub=CSS%20Basics">
        <div class="roadmap-step">

            <h2>2. CSS Basics</h2>
            <p>Understand CSS to style web pages, including layouts, colors, and responsive design.</p>
        </div></a>
        <a href="js.php?title=<?php echo urlencode($title); ?>&sub=JavaScript%20Fundamentals">
        <div class="roadmap-step">
            <h2>3. JavaScript Fundamentals</h2>
            <p>Get familiar with JavaScript, its syntax, and DOM manipulation for dynamic content.</p>
        </div></a>
        <a href="git.php?title=<?php echo urlencode($title); ?>&sub=Version%20Control (Git)">
        <div class="roadmap-step">
            <h2>4. Version Control (Git)</h2>
            <p>Learn how to track changes and collaborate with other developers using Git and GitHub.</p>
        </div></a>
        <a href="cssframe.php?title=<?php echo urlencode($title); ?>&sub=CSS Frameworks">
        <div class="roadmap-step">
            <h2 >5. CSS Frameworks</h2>
            <p>Explore frameworks like Bootstrap or Tailwind CSS to speed up styling and layouts.</p>
        </div></a>
        <a href="jsframe.php?title=<?php echo urlencode($title); ?>&sub=JavaScript Frameworks">
        <div class="roadmap-step">
            <h2 >6. JavaScript Frameworks</h2>
            <p>Dive into frameworks like React, Vue, or Angular to build complex, interactive UIs.</p>
        </div></a>
        <a href="FD7.php?title=<?php echo urlencode($title); ?>&sub=Responsive Design">
        <div class="roadmap-step">
            <h2>7. Responsive Design</h2>
            <p>Master media queries and responsive techniques to make websites mobile-friendly.</p>
        </div></a>
        <a href="FD8.php?title=<?php echo urlencode($title); ?>&sub=Web Performance Optimization">
        <div class="roadmap-step">
            <h2>8. Web Performance Optimization</h2>
            <p>Learn techniques to optimize website performance, like lazy loading and code splitting.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 Frontend Roadmap</p>
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
    
    doc.save('frontend-development-roadmap.pdf');
}
</script>
</body>
</html>
