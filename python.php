<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Python Developer Roadmap</title>
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
        <h1>Python Developer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="py1.php?title=<?php echo urlencode($title); ?>&sub=Python Basics">
        <div class="roadmap-step">
            <h2>1. Python Basics</h2>
            <p>Start with Python syntax, data types, variables, operators, conditionals, and loops. Understand the fundamentals of the language.</p>
        </div></a>
        <a href="py2.php?title=<?php echo urlencode($title); ?>&sub=Data Structures and Algorithms">
        <div class="roadmap-step">
            <h2>2. Data Structures and Algorithms</h2>
            <p>Learn about lists, dictionaries, sets, tuples, and core algorithms. Master these basics to work with data efficiently.</p>
        </div></a>
        <a href="py3.php?title=<?php echo urlencode($title); ?>&sub=Object-Oriented Programming">
        <div class="roadmap-step">
            <h2>3. Object-Oriented Programming (OOP)</h2>
            <p>Understand classes, objects, inheritance, polymorphism, encapsulation, and abstraction to structure code in an organized way.</p>
        </div></a>
        <a href="py4.php?title=<?php echo urlencode($title); ?>&sub=File Handling">
        <div class="roadmap-step">
            <h2>4. File Handling</h2>
            <p>Learn to handle files for reading and writing data, working with file paths, and handling exceptions during file operations.</p>
        </div></a>
        <a href="py5.php?title=<?php echo urlencode($title); ?>&sub=Python Libraries">
        <div class="roadmap-step">
            <h2>5. Python Libraries</h2>
            <p>Get familiar with popular libraries like NumPy, Pandas, and Matplotlib for data manipulation and visualization.</p>
        </div></a>
        <a href="py6.php?title=<?php echo urlencode($title); ?>&sub=Web Development">
        <div class="roadmap-step">
            <h2>6. Web Development (Flask/Django)</h2>
            <p>Explore web frameworks like Flask and Django to build dynamic web applications and understand the basics of backend development.</p>
        </div></a>
        <a href="py7.php?title=<?php echo urlencode($title); ?>&sub=Data Science and Machine Learning">
        <div class="roadmap-step">
            <h2>7. Data Science and Machine Learning</h2>
            <p>Learn libraries like Scikit-Learn, TensorFlow, and Keras. Get comfortable with data analysis and building machine learning models.</p>
        </div></a>
        <a href="py8.php?title=<?php echo urlencode($title); ?>&sub=Testing and Debugging">
        <div class="roadmap-step">
            <h2>8. Testing and Debugging</h2>
            <p>Understand unit testing, TDD (Test-Driven Development), and debugging techniques using Pytest and other tools.</p>
        </div></a>
        <a href="py9.php?title=<?php echo urlencode($title); ?>&sub=Version Control and Collaboration">
        <div class="roadmap-step">
            <h2>9. Version Control and Collaboration</h2>
            <p>Get familiar with Git and GitHub for version control and collaboration with other developers on Python projects.</p>
        </div></a>
        <a href="py10.php?title=<?php echo urlencode($title); ?>&sub=Deploying Applications">
        <div class="roadmap-step">
            <h2>10. Deploying Applications</h2>
            <p>Learn about deployment options like Docker, cloud platforms (AWS, GCP, Azure), and CI/CD for application deployment.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 Python Developer Roadmap</p>
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
    
    doc.save('python-development-roadmap.pdf');
}
</script>
</body>
</html>
