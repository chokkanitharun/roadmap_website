<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    echo "<script>alert('Please log in to access this page.'); window.location.href = 'login.php';</script>";
    exit;
}

// Database connection settings
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "skillroute";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Delete Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // SQL to delete a record
    $delete_sql = "DELETE FROM notes WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "<script>alert('Note deleted successfully.'); window.location.href = 'setting4.php';</script>";
    } else {
        echo "<script>alert('Error deleting note.');</script>";
    }

    $stmt->close();
}

// Handle Edit Request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $new_user_id = $_POST['new_user_id'];
    $new_note = $_POST['new_note'];

    // SQL to update the record
    $update_sql = "UPDATE notes SET user_id = ?, notes = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("isi", $new_user_id, $new_note, $edit_id);

    if ($stmt->execute()) {
        echo "<script>alert('Note updated successfully.'); window.location.href = 'setting4.php';</script>";
    } else {
        echo "<script>alert('Error updating note.');</script>";
    }

    $stmt->close();
}

// Fetch all notes from the notes table
$sql = "SELECT * FROM notes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notes</title>
    <style>
        /* Styles remain unchanged */
        body { font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #1A1A1D; color: #f4f4f4; }
        .container { max-width: 900px; margin: 50px auto; background: #2A2A2D; padding: 30px; border-radius: 12px; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); }
        h1 { text-align: center; margin-bottom: 30px; font-size: 2.5em; color: #A64D79; font-weight: bold; letter-spacing: 1px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #444; }
        th, td { padding: 12px; text-align: left; }
        th { background-color: #6A1E55; color: white; font-size: 1.1em; }
        td { background-color: #333; color: #f4f4f4; font-size: 1em; }
        tr:nth-child(even) td { background-color: #444; }
        tr:hover td { background-color: #555; transform: scale(1.02); transition: all 0.2s ease; }
        .action-buttons { display: flex; gap: 12px; justify-content: center; }
        .btn { padding: 10px 15px; color: white; text-decoration: none; border: none; border-radius: 6px; cursor: pointer; font-size: 1em; text-align: center; width: 80px; transition: background-color 0.3s, transform 0.2s ease; }
        .btn-edit { background-color: #28a745; }
        .btn-delete { background-color: #dc3545; }
        .btn-edit:hover { background-color: #218838; transform: translateY(-2px); }
        .btn-delete:hover { background-color: #c82333; transform: translateY(-2px); }
        .btn:hover { opacity: 0.85; transform: translateY(-3px); }
        form { display: inline-block; }
        .container { animation: fadeIn 1s ease-in-out; }
        @keyframes fadeIn { 0% { opacity: 0; transform: translateY(20px); } 100% { opacity: 1; transform: translateY(0); } }
        td[colspan="5"] { text-align: center; padding: 20px; font-size: 1.2em; color: #A64D79; background-color: #222; border: 1px solid #444; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Notes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['notes']); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <!-- Edit Form -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <input type="text" name="new_user_id" placeholder="User ID" value="<?php echo $row['user_id']; ?>" required>
                                        <input type="text" name="new_note" placeholder="Note" value="<?php echo $row['notes']; ?>" required>
                                        <button type="submit" class="btn btn-edit">Edit</button>
                                    </form>
                                    <!-- Delete Form -->
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this note?');">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align:center;">No notes found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
