<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <title>AI Engineer Roadmap</title>
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
        <h1>AI Engineer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="ai1.php?title=<?php echo urlencode($title); ?>&sub=Programming Foundations">
        <div class="roadmap-step">
            <h2>1. Programming Foundations</h2>
            <p>Start with Python, a widely-used language in AI, and learn data structures, algorithms, and object-oriented programming concepts.</p>
        </div></a>
        <a href="ai2.php?title=<?php echo urlencode($title); ?>&sub=Mathematics for AI">
        <div class="roadmap-step">
            <h2>2. Mathematics for AI</h2>
            <p>Build a strong foundation in linear algebra, calculus, probability, and statistics, which are crucial for understanding AI models.</p>
        </div></a>
        <a href="ai3.php?title=<?php echo urlencode($title); ?>&sub=Data Collection and Preprocessing">
        <div class="roadmap-step">
            <h2>3. Data Collection & Preprocessing</h2>
            <p>Learn techniques for collecting and cleaning data, handling missing values, and normalizing and transforming data for model training.</p>
        </div></a>
        <a href="ai4.php?title=<?php echo urlencode($title); ?>&sub=Machine Learning Basics">
        <div class="roadmap-step">
            <h2>4. Machine Learning Basics</h2>
            <p>Understand supervised, unsupervised, and reinforcement learning, and become familiar with common algorithms like regression, clustering, and decision trees.</p>
        </div></a>
        <a href="ai5.php?title=<?php echo urlencode($title); ?>&sub=Deep Learning and Neural Networks">
        <div class="roadmap-step">
            <h2>5. Deep Learning and Neural Networks</h2>
            <p>Dive into deep learning with frameworks like TensorFlow or PyTorch, and understand the architecture of neural networks and backpropagation.</p>
        </div></a>
        <a href="ai6.php?title=<?php echo urlencode($title); ?>&sub=Model Evaluation and Optimization">
        <div class="roadmap-step">
            <h2>6. Model Evaluation and Optimization</h2>
            <p>Learn techniques for evaluating model accuracy, precision, and recall, and optimizing models through hyperparameter tuning and regularization.</p>
        </div></a>
        <a href="ai7.php?title=<?php echo urlencode($title); ?>&sub=Natural Language Processing (NLP)">
        <div class="roadmap-step">
            <h2>7. Natural Language Processing (NLP)</h2>
            <p>Explore NLP techniques like tokenization, sentiment analysis, word embeddings, and working with pre-trained models for text data.</p>
        </div></a>
        <a href="ai8.php?title=<?php echo urlencode($title); ?>&sub=Computer Vision">
        <div class="roadmap-step">
            <h2>8. Computer Vision</h2>
            <p>Learn image processing basics, convolutional neural networks (CNNs), and tools for object detection, segmentation, and image classification.</p>
        </div></a>
        <a href="ai9.php?title=<?php echo urlencode($title); ?>&sub=Deployment and MLOps">
        <div class="roadmap-step">
            <h2>9. Deployment and MLOps</h2>
            <p>Understand deploying models in production, version control, model monitoring, and using tools like Docker, Kubernetes, and cloud services.</p>
        </div></a>
        <a href="ai10.php?title=<?php echo urlencode($title); ?>&sub=AI Ethics and Responsible AI">
        <div class="roadmap-step">
            <h2>10. AI Ethics and Responsible AI</h2>
            <p>Learn about fairness, transparency, and bias in AI, and how to design models responsibly to prevent unintended consequences.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 AI Engineer Roadmap</p>
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
    
    doc.save('ai-development-roadmap.pdf');
}
</script>
</body>
</html>
