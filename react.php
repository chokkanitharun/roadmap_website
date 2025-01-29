<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>React Developer Roadmap</title>
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
        <h1>React Developer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="react1.php?title=<?php echo urlencode($title); ?>&sub=JavaScript Fundamentals">
        <div class="roadmap-step">
            <h2>1. JavaScript Fundamentals</h2>
            <p>Master JavaScript fundamentals including ES6+ features (arrow functions, promises, async/await, destructuring) before diving into React.</p>
        </div></a>
        <a href="react2.php?title=<?php echo urlencode($title); ?>&sub=JSX">
        <div class="roadmap-step">
            <h2>2. JSX</h2>
            <p>Understand JSX syntax, how it works, and why it’s used to define component structures in React.</p>
        </div></a>
        <a href="react3.php?title=<?php echo urlencode($title); ?>&sub=Components and Props">
        <div class="roadmap-step">
            <h2>3. Components and Props</h2>
            <p>Learn to create and manage functional and class components, and pass data using props.</p>
        </div></a>
        <a href="react4.php?title=<?php echo urlencode($title); ?>&sub=State Management">
        <div class="roadmap-step">
            <h2>4. State Management</h2>
            <p>Understand component state with the useState hook, and how to manage dynamic data within components.</p>
        </div></a>
        <a href="react5.php?title=<?php echo urlencode($title); ?>&sub=Lifecycle Methods and useEffect">
        <div class="roadmap-step">
            <h2>5. Lifecycle Methods and useEffect</h2>
            <p>Learn React component lifecycle methods, and manage side effects using the useEffect hook in functional components.</p>
        </div></a>
        <a href="react6.php?title=<?php echo urlencode($title); ?>&sub=React Router">
        <div class="roadmap-step">
            <h2>6. React Router</h2>
            <p>Implement routing to navigate between pages in single-page applications using React Router.</p>
        </div></a>
        <a href="react7.php?title=<?php echo urlencode($title); ?>&sub=Handling Events">
        <div class="roadmap-step">
            <h2>7. Handling Events</h2>
            <p>Understand how to handle user input and events such as clicks, form submissions, and key presses.</p>
        </div></a>
        <a href="react8.php?title=<?php echo urlencode($title); ?>&sub=Conditional Rendering">
        <div class="roadmap-step">
            <h2>8. Conditional Rendering</h2>
            <p>Learn techniques to conditionally render components based on application state or data.</p>
        </div></a>
        <a href="react9.php?title=<?php echo urlencode($title); ?>&sub=Forms and Controlled Components">
        <div class="roadmap-step">
            <h2>9. Forms and Controlled Components</h2>
            <p>Handle forms using controlled components, and understand form validation techniques in React.</p>
        </div></a>
        <a href="react10.php?title=<?php echo urlencode($title); ?>&sub=Context API">
        <div class="roadmap-step">
            <h2>10. Context API</h2>
            <p>Learn the Context API to pass data through the component tree without prop drilling, especially for global state management.</p>
        </div></a>
        <a href="react11.php?title=<?php echo urlencode($title); ?>&sub=Advanced State Management with Redux or Recoil">
        <div class="roadmap-step">
            <h2>11. Advanced State Management with Redux or Recoil</h2>
            <p>Explore advanced state management libraries like Redux or Recoil to manage complex state in larger applications.</p>
        </div></a>
        <a href="react12.php?title=<?php echo urlencode($title); ?>&sub=React Performance Optimization">
        <div class="roadmap-step">
            <h2>12. React Performance Optimization</h2>
            <p>Learn optimization techniques, including memoization, lazy loading, and React’s Profiler API to improve app performance.</p>
        </div></a>
        <a href="react13.php?title=<?php echo urlencode($title); ?>&sub=Testing in React">
        <div class="roadmap-step">
            <h2>13. Testing in React</h2>
            <p>Get familiar with testing frameworks like Jest and React Testing Library to write unit and integration tests for components.</p>
        </div></a>
        <a href="react14.php?title=<?php echo urlencode($title); ?>&sub=Deploying React Applications">
        <div class="roadmap-step">
            <h2>14. Deploying React Applications</h2>
            <p>Learn deployment strategies, including hosting React applications on platforms like Netlify, Vercel, or Firebase.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 React Developer Roadmap</p>
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
    
    doc.save('react-development-roadmap.pdf');
}
</script>
</body>
</html>
