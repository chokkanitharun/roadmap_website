<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "skillroute";

$conn = new mysqli($servername, $username, $password, $databasename);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to avoid warnings
$response = null;
$uploadedImage = null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $path = $_POST['path'];
    $roadmap = $_POST['roadmap'];
    $image = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];

    // Move uploaded image to 'uploads' folder
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $targetFile = $uploadDir . basename($image);

    if (move_uploaded_file($imageTmp, $targetFile)) {
        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO curriculam (title, image, path, roadmap) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $targetFile, $path, $roadmap); // Save full path
        if ($stmt->execute()) {
            $response = ["success" => true, "message" => "Roadmap added successfully!"];
        } else {
            $response = ["success" => false, "message" => "Failed to add roadmap to the database."];
        }
        $stmt->close();
    } else {
        $response = ["success" => false, "message" => "Failed to upload the image file."];
    }
}

// Fetch the last inserted image for display
$result = $conn->query("SELECT image FROM curriculam ORDER BY id DESC LIMIT 1");
if ($result) {
    $row = $result->fetch_assoc();
    $uploadedImage = $row['image'] ?? null;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Roadmap</title>
    <style>
        /* Your styles remain unchanged */
        
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #3B1C32,#A64D79 );
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 90%;
            margin: 20px;
            padding: 30px;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h1 {
            font-size: 2rem;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
        }
        .success {
            color: #28a745;
            text-align: center;
            margin-bottom: 10px;
        }
        .error {
            color: #dc3545;
            text-align: center;
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: #555;
        }
        input, select, button {
            display: block;
            width: 95%;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #6a11cb;
            outline: none;
            box-shadow: 0 0 8px rgba(106, 17, 203, 0.5);
        }
        button {
            background-color: #A64D79;
            color: #fff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        button:hover {
            background-color: #3B1C32;
        }
        button:active {
            transform: scale(0.98);
        }
        .image-preview {
            margin-top: 20px;
            text-align: center;
        }
        .image-preview img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .image-preview img:hover {
            transform: scale(1.1);
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 1.8rem;
            }
            button {
                padding: 12px;
                font-size: 0.9rem;
            }
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Roadmap</h1>
        <?php if ($response): ?>
            <div class="<?= $response['success'] ? 'success' : 'error' ?>">
                <?= htmlspecialchars($response['message']); ?>
            </div>
        <?php endif; ?>
        <?php if ($uploadedImage): ?>
            <div class="image-preview">
                <h3>Uploaded Image:</h3>
                <img src="<?= htmlspecialchars($uploadedImage); ?>" alt="Uploaded Roadmap Image">
            </div>
        <?php endif; ?>
        <form id="roadmapForm" method="POST" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="Enter title" required>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <label for="path">Path</label>
            <input type="text" id="path" name="path" placeholder="e.g., roadmap.html" required>
            <label for="roadmap">Roadmap Type</label>
            <select id="roadmap" name="roadmap" required>
                <option value="">Select Roadmap Type</option>
                <option value="Role Based Roadmaps">Role Based Roadmaps</option>
                <option value="Skill Based Roadmaps">Skill Based Roadmaps</option>
                <option value="Project Ideas">Project Ideas</option>
            </select>
            <button type="submit">Add Roadmap</button>
        </form>
    </div>
</body>
</html>
