<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>HTML Developer Roadmap</title>
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
        <h1>HTML Developer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="html1.php?title=<?php echo urlencode($title); ?>&sub=HTML Basics">
        <div class="roadmap-step">
            <h2>1. HTML Basics</h2>
            <p>Start by learning HTML structure, tags, and elements. Understand how to create headings, paragraphs, lists, links, and images.</p>
        </div></a>
        <a href="html2.php?title=<?php echo urlencode($title); ?>&sub=HTML5 Semantic Elements">
        <div class="roadmap-step">
            <h2>2. HTML5 Semantic Elements</h2>
            <p>Learn semantic tags like &lt;header&gt;, &lt;footer&gt;, &lt;nav&gt;, &lt;section&gt;, and &lt;article&gt; to improve website accessibility and SEO.</p>
        </div></a>
        <a href="html3.php?title=<?php echo urlencode($title); ?>&sub=Forms and Input Types">
        <div class="roadmap-step">
            <h2>3. Forms and Input Types</h2>
            <p>Understand how to create forms with various input types, including text, email, radio buttons, checkboxes, and submit buttons.</p>
        </div></a>
        <a href="html4.php?title=<?php echo urlencode($title); ?>&sub=Tables and Lists">
        <div class="roadmap-step">
            <h2>4. Tables and Lists</h2>
            <p>Learn how to create and structure tables and lists for organized data representation.</p>
        </div></a>
        <a href="html5.php?title=<?php echo urlencode($title); ?>&sub=HTML Media Elements">
        <div class="roadmap-step">
            <h2>5. HTML Media Elements</h2>
            <p>Get familiar with adding multimedia content to your site using &lt;audio&gt;, &lt;video&gt;, and &lt;img&gt; tags.</p>
        </div></a>
        <a href="html6.php?title=<?php echo urlencode($title); ?>&sub=Document Structure and Doctype">
        <div class="roadmap-step">
            <h2>6. Document Structure and Doctype</h2>
            <p>Understand document structure, including DOCTYPE declaration, &lt;html&gt;, &lt;head&gt;, &lt;body&gt;, and meta tags.</p>
        </div></a>
        <a href="html7.php?title=<?php echo urlencode($title); ?>&sub=Accessibility in HTML">
        <div class="roadmap-step">
            <h2>7. Accessibility in HTML</h2>
            <p>Learn best practices for making HTML accessible, including using ARIA roles, labels, and alt text for images.</p>
        </div></a>
        <a href="html8.php?title=<?php echo urlencode($title); ?>&sub=HTML SEO Basics">
        <div class="roadmap-step">
            <h2>8. HTML SEO Basics</h2>
            <p>Get familiar with SEO techniques, such as using meta tags, proper heading structures, and semantic elements for search engine visibility.</p>
        </div></a>
        <a href="html9.php?title=<?php echo urlencode($title); ?>&sub=HTML Best Practices">
        <div class="roadmap-step">
            <h2>9. HTML Best Practices</h2>
            <p>Learn best practices, such as code organization, indentation, and commenting, to keep your HTML clean and readable.</p>
        </div></a>
        <a href="html10.php?title=<?php echo urlencode($title); ?>&sub=Advanced HTML Microdata and Metadata">
        <div class="roadmap-step">
            <h2>10. Advanced HTML Microdata and Metadata</h2>
            <p>Dive deeper into metadata, microdata, and structured data for enhanced SEO and integration with third-party services.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 HTML Developer Roadmap</p>
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
    
    doc.save('html-development-roadmap.pdf');
}
</script>
</body>
</html>
