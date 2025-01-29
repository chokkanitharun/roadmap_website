<?php

    $title = $_GET['title'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Cloud Computing Engineer Roadmap</title>
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
        <h1>Cloud Computing Engineer Roadmap</h1>
        <button class="download-btn" onclick="downloadPDF()">Download Roadmap</button>
    </header>
    <section class="roadmap-container">
        <a href="cloud1.php?title=<?php echo urlencode($title); ?>&sub=Networking Fundamentals">
        <div class="roadmap-step">
            <h2>1. Networking Fundamentals</h2>
            <p>Understand the basics of networking, including IP addressing, DNS, firewalls, and load balancing, as they are fundamental for cloud infrastructure.</p>
        </div></a>
        <a href="cloud2.php?title=<?php echo urlencode($title); ?>&sub=Operating Systems and Linux Basics">
        <div class="roadmap-step">
            <h2>2. Operating Systems and Linux Basics</h2>
            <p>Gain a solid foundation in Linux and Windows server environments, command-line interfaces, and system administration.</p>
        </div></a>
        <a href="cloud3.php?title=<?php echo urlencode($title); ?>&sub=Virtualization and Containers">
        <div class="roadmap-step">
            <h2>3. Virtualization and Containers</h2>
            <p>Learn about virtualization technologies like VMware and containers such as Docker for resource management and isolation in the cloud.</p>
        </div></a>
        <a href="cloud4.php?title=<?php echo urlencode($title); ?>&sub=Cloud Service Providers">
        <div class="roadmap-step">
            <h2>4. Cloud Service Providers</h2>
            <p>Get familiar with major cloud platforms: AWS, Microsoft Azure, and Google Cloud Platform (GCP), and their services.</p>
        </div></a>
        <a href="cloud5.php?title=<?php echo urlencode($title); ?>&sub=Core Cloud Services">
        <div class="roadmap-step">
            <h2>5. Core Cloud Services</h2>
            <p>Learn core services for each provider, including storage (S3, Blob), compute (EC2, VMs), and databases (RDS, Cloud SQL).</p>
        </div></a>
        <a href="cloud6.php?title=<?php echo urlencode($title); ?>&sub=Infrastructure as Code (IaC)">
        <div class="roadmap-step">
            <h2>6. Infrastructure as Code (IaC)</h2>
            <p>Understand IaC using tools like Terraform or AWS CloudFormation to automate cloud resource management.</p>
        </div></a>
        <a href="cloud7.php?title=<?php echo urlencode($title); ?>&sub=CI/CD Pipelines  DevOps">
        <div class="roadmap-step">
            <h2>7. CI/CD Pipelines  DevOps</h2>
            <p>Implement CI/CD processes with tools like Jenkins, GitHub Actions, and understand DevOps principles for continuous integration and deployment.</p>
        </div></a>
        <a href="cloud8.php?title=<?php echo urlencode($title); ?>&sub=Monitoring and Logging">
        <div class="roadmap-step">
            <h2>8. Monitoring and Logging</h2>
            <p>Learn how to monitor applications and infrastructure using tools like CloudWatch, Prometheus, or Azure Monitor for optimal performance.</p>
        </div></a>
        <a href=cloud9.php?title=<?php echo urlencode($title); ?>&sub=Security and Identity Management">
        <div class="roadmap-step">
            <h2>9. Security and Identity Management</h2>
            <p>Understand cloud security best practices, IAM roles, and compliance frameworks like GDPR and HIPAA.</p>
        </div></a>
        <a href="cloud10.php?title=<?php echo urlencode($title); ?>&sub=Serverless and Microservices Architecture">
        <div class="roadmap-step">
            <h2>10. Serverless and Microservices Architecture</h2>
            <p>Explore serverless computing (AWS Lambda, Azure Functions) and design microservices for scalable, resilient applications.</p>
        </div></a>
    </section>
    <footer>
        <p>© 2024 Cloud Computing Roadmap</p>
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
    
    doc.save('cloud-development-roadmap.pdf');
}
</script>
</body>
</html>
