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

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
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
            $stmt = $conn->prepare("INSERT INTO curriculam (title, image, path, roadmap) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $targetFile, $path, $roadmap);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $path = $_POST['path'];
        $roadmap = $_POST['roadmap'];
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];

        if ($image) {
            $uploadDir = 'uploads/';
            $targetFile = $uploadDir . basename($image);
            if (move_uploaded_file($imageTmp, $targetFile)) {
                $stmt = $conn->prepare("UPDATE curriculam SET title = ?, image = ?, path = ?, roadmap = ? WHERE id = ?");
                $stmt->bind_param("ssssi", $title, $targetFile, $path, $roadmap, $id);
            }
        } else {
            $stmt = $conn->prepare("UPDATE curriculam SET title = ?, path = ?, roadmap = ? WHERE id = ?");
            $stmt->bind_param("sssi", $title, $path, $roadmap, $id);
        }
        $stmt->execute();
        $stmt->close();
    } elseif ($action === 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM curriculam WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch all records
$curriculamData = $conn->query("SELECT * FROM curriculam");
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculam Management</title>
</head>
<body>
    <div class="container">
        <h1>Curriculam Management</h1>

        <table id="curriculamTable" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Path</th>
                    <th>Roadmap</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $curriculamData->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td><img src="<?= htmlspecialchars($row['image']) ?>" alt="Image" width="50"></td>
                        <td><?= htmlspecialchars($row['path']) ?></td>
                        <td><?= htmlspecialchars($row['roadmap']) ?></td>
                        <td>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="action" value="delete">
                                <button type="submit">Delete</button>
                            </form>
                            <button onclick="editRow(<?= $row['id'] ?>, '<?= htmlspecialchars($row['title']) ?>', '<?= htmlspecialchars($row['path']) ?>', '<?= htmlspecialchars($row['roadmap']) ?>')">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <form id="curriculamForm" method="POST" enctype="multipart/form-data">
            <h2 id="formTitle">Add New Entry</h2>

            <input type="hidden" name="id" id="id" value="">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <label for="image">Image</label>
            <input type="file" name="image" id="image">

            <label for="path">Path</label>
            <input type="text" name="path" id="path" required>

            <label for="roadmap">Roadmap</label>
            <select name="roadmap" id="roadmap" required>
                <option value="Role Based Roadmaps">Role Based Roadmaps</option>
                <option value="Skill Based Roadmaps">Skill Based Roadmaps</option>
                <option value="Project Ideas">Project Ideas</option>
            </select>

            <button type="submit" name="action" value="add">Add</button>
            <button type="submit" name="action" value="update">Update</button>
        </form>
    </div>

    <script>
        function editRow(id, title, path, roadmap) {
            document.getElementById('id').value = id;
            document.getElementById('title').value = title;
            document.getElementById('path').value = path;
            document.getElementById('roadmap').value = roadmap;
            document.getElementById('formTitle').textContent = 'Edit Entry';
        }
    </script>
</body>
</html>
