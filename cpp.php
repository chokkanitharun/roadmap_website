<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>C++ Developer Roadmap</title>
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
        <h1>C++ Developer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
    <a href="cpp1.php?title=<?php echo urlencode($title); ?>&sub=cpp Basics">
        <div class="roadmap-step">
            <h2>1. C++ Basics</h2>
            <p>Start with the basics of C++ syntax, data types, variables, operators, and control structures.</p>
        </div></a>
        <a href="cpp2.php?title=<?php echo urlencode($title); ?>&sub=Object-Oriented Programming">
        <div class="roadmap-step">
            <h2>2. Object-Oriented Programming (OOP)</h2>
            <p>Learn OOP concepts in C++ including classes, objects, inheritance, polymorphism, encapsulation, and abstraction.</p>
        </div></a>
        <a href="cpp3.php?title=<?php echo urlencode($title); ?>&sub=Memory Management">
        <div class="roadmap-step">
            <h2>3. Memory Management</h2>
            <p>Understand memory allocation, pointers, references, dynamic memory, and the importance of memory management in C++.</p>
        </div></a>
        <a href="cpp4.php?title=<?php echo urlencode($title); ?>&sub=Standard Template Library">
        <div class="roadmap-step">
            <h2>4. Standard Template Library (STL)</h2>
            <p>Get familiar with the STL, including containers like vectors, lists, maps, and algorithms to simplify coding.</p>
        </div></a>
        <a href="cpp5.php?title=<?php echo urlencode($title); ?>&sub=File Handling">
        <div class="roadmap-step">
            <h2>5. File Handling</h2>
            <p>Learn to read from and write to files in C++ for data storage and retrieval using file streams.</p>
        </div></a>
        <a href="cpp6.php?title=<?php echo urlencode($title); ?>&sub=Advanced Cpp Features">
        <div class="roadmap-step">
            <h2>6. Advanced Cpp Features</h2>
            <p>Dive into advanced topics like multithreading, smart pointers, lambdas, move semantics, and RAII (Resource Acquisition Is Initialization).</p>
        </div></a>
        <a href="cpp7.php?title=<?php echo urlencode($title); ?>&sub=Debugging and Profiling">
        <div class="roadmap-step">
            <h2>7. Debugging and Profiling</h2>
            <p>Master debugging techniques and profiling tools to optimize and debug C++ code effectively.</p>
        </div></a>
        <a href="cpp8.php?title=<?php echo urlencode($title); ?>&sub=Design Patterns">
        <div class="roadmap-step">
            <h2>8. Design Patterns</h2>
            <p>Understand common design patterns (e.g., Singleton, Factory, Observer) and how to implement them in C++.</p>
        </div></a>
        <a href="cpp9.php?title=<?php echo urlencode($title); ?>&sub=System Programming">
        <div class="roadmap-step">
            <h2>9. System Programming</h2>
            <p>Learn system-level programming concepts like networking, file systems, and inter-process communication.</p>
        </div></a>
        <a href="cpp10.php?title=<?php echo urlencode($title); ?>&sub=Build Tools and Version Control">
        <div class="roadmap-step">
            <h2>10. Build Tools and Version Control</h2>
            <p>Get comfortable with build tools (e.g., CMake, Makefile) and version control (e.g., Git) for managing projects and collaboration.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 C++ Developer Roadmap</p>
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
    
    doc.save('cpp-development-roadmap.pdf');
}
</script>
</body>
</html>
