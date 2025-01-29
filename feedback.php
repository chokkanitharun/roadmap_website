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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roadmap = $_POST['roadmap'];
    $rating = $_POST['rating'];

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (roadmap, rating) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $roadmap, $rating);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for your feedback!'); window.location.href = 'feedback.php';</script>";
    } else {
        echo "<script>alert('Error saving feedback. Please try again.');</script>";
    }

    $stmt->close();
}

// Fetch all feedback to display
$feedback_query = "SELECT roadmap, AVG(rating) as avg_rating, COUNT(*) as count FROM feedback GROUP BY roadmap";
$feedback_result = $conn->query($feedback_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
    <style>
      body {
    font-family: Arial, sans-serif;
    background: linear-gradient(45deg,rgb(236, 234, 227),rgb(226, 134, 208),rgb(147, 32, 99),rgb(64, 5, 40));
background-size: 400% 400%;
animation: gradientBackground 10s ease infinite;
    color: rgb(249, 249, 250);
    margin: 0;
    padding: 0;
}
a{
            text-decoration:none;
            color:white;
            font-weight:bold;
        }
@keyframes gradientBackground {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.container {
    max-width: 700px;
    margin: 50px auto;
    background: #2A2A2D;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 
    0 10px 20px rgba(47, 6, 28, 0.6), 
    0 0 25px rgba(172, 107, 134, 0.8),
    0 0 15px 5px rgba(172, 107, 134, 0.9), 
    0 0 30px 10px rgba(255, 0, 127, 0.7), 
    0 0 50px 15px rgba(255, 0, 255, 0.5);

    opacity: 0; /* Start with the container invisible */
    animation: fadeIn 1s forwards; /* Fade-in animation */
}

h1 {
    text-align: center;
    color: #A64D79;
    opacity: 0; /* Start with invisible heading */
    animation: slideUp 1s 0.5s forwards; /* Slide up animation */
}

form {
    margin: 20px 0;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

select, input[type="number"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #444;
    background-color: #333;
    color: #f4f4f4;
    opacity: 0; /* Start with invisible form elements */
    animation: fadeIn 1s 1s forwards; /* Fade-in animation */
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #6A1E55;
    color: #f4f4f4;
    font-size: 1.1em;
    cursor: pointer;
    opacity: 0; /* Start with invisible button */
    animation: fadeIn 1s 1.5s forwards; /* Fade-in animation */
}

button:hover {
    background-color: #A64D79;
    transform: scale(1.05); /* Slight hover effect */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    opacity: 0; /* Start with invisible table */
    animation: fadeIn 1s 2s forwards; /* Fade-in animation */
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #444;
}

th {
    background-color: #6A1E55;
    color: white;
}

td {
    background-color: #333;
}

tr:hover td {
    background-color: #444;
}

/* Media Queries for Responsiveness */

/* For smaller screens (tablets, phones in portrait mode) */
@media (max-width: 768px) {
    .container {
        padding: 15px;
        margin: 20px;
    }

    h1 {
        font-size: 1.8em;
    }

    label, select, input[type="number"], button {
        font-size: 1em;
    }

    table {
        font-size: 0.9em;
    }
}

/* For very small screens (phones in landscape mode or smaller) */
@media (max-width: 480px) {
    .container {
        padding: 10px;
    }

    h1 {
        font-size: 1.5em;
    }

    label, select, input[type="number"], button {
        font-size: 0.9em;
    }

    table {
        font-size: 0.85em;
    }

    td, th {
        padding: 8px;
    }
}

/* Animations */

/* Fade-in animation */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

/* Slide-up animation for heading */
@keyframes slideUp {
    from {
        transform: translateY(20px);
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
    <div class="container">
    <h3 ><a href="index.php">Home</a></h3>
        <h1>Give Your Feedback</h1>
        <form method="POST">
            <div class="form-group">
                <label for="roadmap">Select Roadmap:</label>
                <select name="roadmap" id="roadmap" required>
                    <option value="frontend">Frontend</option>
                    <option value="backend">Backend</option>
                    <option value="fullstack">Fullstack</option>
                    <option value="android">Android</option>
                    <option value="ios">iOS</option>
                    <option value="cloud">Cloud</option>
                    <option value="ai">AI</option>
                    <option value="cpp">C++</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                    <option value="kotlin">Kotlin</option>
                    <option value="react">React</option>
                    <option value="js">JavaScript</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rating">Star Rating (1-5):</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
            </div>
            <button type="submit">Submit Feedback</button>
        </form>

        <h2>Feedback Summary</h2>
        <table>
            <thead>
                <tr>
                    <th>Roadmap</th>
                    <th>Average Rating</th>
                    <th>Total Feedback</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($feedback_result->num_rows > 0): ?>
                    <?php while ($row = $feedback_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['roadmap']); ?></td>
                            <td><?php echo number_format($row['avg_rating'], 1); ?></td>
                            <td><?php echo $row['count']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No feedback available</td>
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
