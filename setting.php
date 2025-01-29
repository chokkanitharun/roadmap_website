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
$dbname = "skillroute"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all users from the `userdetails` table
$sql = "SELECT * FROM userdetails";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // SQL to delete a record
    $delete_sql = "DELETE FROM userdetails WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully.'); window.location.href = 'setting.php';</script>";
    } else {
        echo "<script>alert('Error deleting user.');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <style>
     body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #1A1A1D; /* Dark background for the whole page */
    color: #f4f4f4; /* Light text color for better contrast */
}

.container {
    max-width: 900px;
    margin: 50px auto;
    background: #2A2A2D; /* Darker container background */
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Slight shadow for depth */
}

h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5em;
    color: #A64D79; /* Dark pink color for headings */
    font-weight: bold;
    letter-spacing: 1px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #444;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #6A1E55; /* Dark purple for headers */
    color: white;
    font-size: 1.1em;
}

td {
    background-color: #333;
    color: #f4f4f4; /* Light color for data */
    font-size: 1em;
}

tr:nth-child(even) td {
    background-color: #444; /* Alternate row color */
}

tr:hover td {
    background-color: #555; /* Subtle hover effect on rows */
    transform: scale(1.02); /* Slight scaling for hover effect */
    transition: all 0.2s ease;
}

.action-buttons {
    display: flex;
    gap: 12px;
    justify-content: center;
}

.btn {
    padding: 10px 15px;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    text-align: center;
    width: 80px;
    transition: background-color 0.3s, transform 0.2s ease;
}

.btn-edit {
    background-color: #28a745; /* Green color for Edit */
}

.btn-delete {
    background-color: #dc3545; /* Red color for Delete */
}

.btn-edit:hover {
    background-color: #218838; /* Darker green on hover */
    transform: translateY(-2px); /* Slightly lift on hover */
}

.btn-delete:hover {
    background-color: #c82333; /* Darker red on hover */
    transform: translateY(-2px); /* Slightly lift on hover */
}

.btn {
    transition: transform 0.3s ease, background-color 0.2s;
}

.btn:hover {
    opacity: 0.85; /* Slight transparency effect on hover */
    transform: translateY(-3px); /* Slight lift on hover */
}

form {
    display: inline-block;
}

/* Subtle animation for page load */
.container {
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Centering the message for no users */
td[colspan="5"] {
    text-align: center;
    padding: 20px;
    font-size: 1.2em;
    color: #A64D79;
    background-color: #222;
    border: 1px solid #444;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Users</h1>
        <table>
        <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['password']); ?></td>
                <td>
                    <div class="action-buttons">
                        <a class="btn btn-edit" href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" style="text-align:center;">No users found</td>
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
