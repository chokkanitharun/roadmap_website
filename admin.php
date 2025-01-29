<?php
include("config.php"); // Include the database connection

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add new curriculum
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $sub = $_POST['sub'];
        $abeginner = $_POST['abeginner'];
        $aadvance = $_POST['aadvance'];
        $vbeginner = $_POST['vbeginner'];
        $vadvance = $_POST['vadvance'];
        $cbeginner = $_POST['cbeginner'];
        $cadvance = $_POST['cadvance'];

        $query = "INSERT INTO curriculamlist (title, sub, abeginner, aadvance, vbeginner, vadvance, cbeginner, cadvance) 
                  VALUES ('$title', '$sub', '$abeginner', '$aadvance', '$vbeginner', '$vadvance', '$cbeginner', '$cadvance')";
        if ($conn->query($query)) {
            echo "<script>alert('Curriculum added successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    // Update curriculum
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $sub = $_POST['sub'];
        $abeginner = $_POST['abeginner'];
        $aadvance = $_POST['aadvance'];
        $vbeginner = $_POST['vbeginner'];
        $vadvance = $_POST['vadvance'];
        $cbeginner = $_POST['cbeginner'];
        $cadvance = $_POST['cadvance'];

        $query = "UPDATE curriculamlist SET title='$title', sub='$sub', abeginner='$abeginner', aadvance='$aadvance', 
                  vbeginner='$vbeginner', vadvance='$vadvance', cbeginner='$cbeginner', cadvance='$cadvance' WHERE id='$id'";
        if ($conn->query($query)) {
            echo "<script>alert('Curriculum updated successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }

    // Delete curriculum
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM curriculamlist WHERE id='$id'";
        if ($conn->query($query)) {
            echo "<script>alert('Curriculum deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}

// Fetch curriculum data
$query = "SELECT * FROM curriculamlist";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
          body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #212529;
            animation: fadeIn 1s ease-in-out;
        }

        /* Header Styling with animation */
        header {
            background: linear-gradient(90deg, #3B1C32, #A64D79);
            padding: 20px;
            text-align: center;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: slideDown 1s ease-out;
        }

        /* Header Title */
        h1,h3 {
            margin: 0;
            font-size: 2.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Container styling */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 15px;
        }

        /* Form and Table Section Styling */
        .form-section, .table-section {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .form-section:hover, .table-section:hover {
            transform: scale(1.02);
        }

        /* Section titles */
        .form-section h3, .table-section h3 {
            font-size: 1.5rem;
            color: #343a40;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: fadeInLeft 1s ease-out;
        }

        /* Input fields */
        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        /* Input focus effect */
        form input[type="text"]:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.5);
            transform: translateY(-3px);
        }

        /* Button Styling with Hover Effects */
        form button {
            background-color: #A64D79;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        /* Button hover animation */
        form button:hover {
            background-color:#3B1C32 ;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Button ripple effect */
        form button::before {
            content: '';
            position: absolute;
            width: 300%;
            height: 300%;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            animation: ripple 0.6s linear;
            transform: scale(0);
            pointer-events: none;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes ripple {
            to {
                transform: scale(1);
                opacity: 0;
            }
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            animation: fadeInUp 1s ease-out;
        }

        table thead {
            background-color:#3B1C32 ;
            color: white;
            text-transform: uppercase;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #dee2e6;
            font-size: 1rem;
        }

        table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        table tbody tr:hover {
            background-color: #e9ecef;
            cursor: pointer;
            transform: translateY(-5px);
            transition: transform 0.3s ease-out;
        }

        /* Action Buttons Styling */
        .actions button {
            margin: 5px;
            padding: 8px 12px;
            font-size: 0.9rem;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .actions button.edit {
            background-color: #28a745;
            color: white;
        }

        .actions button.delete {
            background-color: #dc3545;
            color: white;
        }

        .actions button:hover {
            transform: scale(1.1);
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInLeft {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>

    <!-- Add Curriculum Form -->
    <div class="form-section">
        <form method="POST">
            <h3>Add Curriculum</h3>
            <label>Title:</label><br>
            <input type="text" name="title" required><br>
            <label>Subject:</label><br>
            <input type="text" name="sub" required><br>
            <label>Articles (Beginner):</label><br>
            <input type="text" name="abeginner" required><br>
            <label>Articles (Advanced):</label><br>
            <input type="text" name="aadvance" required><br>
            <label>Videos (Beginner):</label><br>
            <input type="text" name="vbeginner" required><br>
            <label>Videos (Advanced):</label><br>
            <input type="text" name="vadvance" required><br>
            <label>Courses (Beginner):</label><br>
            <input type="text" name="cbeginner" required><br>
            <label>Courses (Advanced):</label><br>
            <input type="text" name="cadvance" required><br>
            <button type="submit" name="add">Add Curriculum</button>
        </form>
    </div>

    <hr>

    <!-- Curriculum List Table -->
    <div class="table-section">
    <h3>Curriculum List</h3>
    <div style="overflow: auto; max-height: 500px;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Articles (Beginner)</th>
                    <th>Articles (Advanced)</th>
                    <th>Videos (Beginner)</th>
                    <th>Videos (Advanced)</th>
                    <th>Courses (Beginner)</th>
                    <th>Courses (Advanced)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['sub']; ?></td>
                            <td><?php echo $row['abeginner']; ?></td>
                            <td><?php echo $row['aadvance']; ?></td>
                            <td><?php echo $row['vbeginner']; ?></td>
                            <td><?php echo $row['vadvance']; ?></td>
                            <td><?php echo $row['cbeginner']; ?></td>
                            <td><?php echo $row['cadvance']; ?></td>
                            <td class="actions">
                                <!-- Edit Form -->
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="button" class="edit" onclick="populateEditForm('<?php echo $row['id']; ?>', '<?php echo $row['title']; ?>', '<?php echo $row['sub']; ?>', '<?php echo $row['abeginner']; ?>', '<?php echo $row['aadvance']; ?>', '<?php echo $row['vbeginner']; ?>', '<?php echo $row['vadvance']; ?>', '<?php echo $row['cbeginner']; ?>', '<?php echo $row['cadvance']; ?>')">Edit</button>
                                </form>
                                <!-- Delete Form -->
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete" class="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='10'>No curriculums found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


    <!-- Edit Curriculum Form -->
    <div class="edit-form-section" style="display:none;">
        <h3>Edit Curriculum</h3>
        <form method="POST">
            <input type="hidden" name="id" id="edit-id">
            <label>Title:</label><br>
            <input type="text" name="title" id="edit-title" required><br>
            <label>Subject:</label><br>
            <input type="text" name="sub" id="edit-sub" required><br>
            <label>Articles (Beginner):</label><br>
            <input type="text" name="abeginner" id="edit-abeginner" required><br>
            <label>Articles (Advanced):</label><br>
            <input type="text" name="aadvance" id="edit-aadvance" required><br>
            <label>Videos (Beginner):</label><br>
            <input type="text" name="vbeginner" id="edit-vbeginner" required><br>
            <label>Videos (Advanced):</label><br>
            <input type="text" name="vadvance" id="edit-vadvance" required><br>
            <label>Courses (Beginner):</label><br>
            <input type="text" name="cbeginner" id="edit-cbeginner" required><br>
            <label>Courses (Advanced):</label><br>
            <input type="text" name="cadvance" id="edit-cadvance" required><br>
            <button type="submit" name="edit">Update Curriculum</button>
        </form>
    </div>

    <script>
        function populateEditForm(id, title, sub, abeginner, aadvance, vbeginner, vadvance, cbeginner, cadvance) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-sub').value = sub;
            document.getElementById('edit-abeginner').value = abeginner;
            document.getElementById('edit-aadvance').value = aadvance;
            document.getElementById('edit-vbeginner').value = vbeginner;
            document.getElementById('edit-vadvance').value = vadvance;
            document.getElementById('edit-cbeginner').value = cbeginner;
            document.getElementById('edit-cadvance').value = cadvance;

            // Show the edit form
            document.querySelector('.edit-form-section').style.display = 'block';
        }
    </script>
</body>
</html>
