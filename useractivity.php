<?php
include("config.php");

// Fetch today's date
$today = date("Y-m-d");

// Query to count logins and signups
$login_count_query = "SELECT COUNT(*) AS login_count FROM user_activity WHERE activity_type = 'login' AND DATE(activity_time) = '$today'";
$signup_count_query = "SELECT COUNT(*) AS signup_count FROM user_activity WHERE activity_type = 'signup' AND DATE(activity_time) = '$today'";

$login_result = $conn->query($login_count_query);
$signup_result = $conn->query($signup_count_query);

$login_count = $login_result->fetch_assoc()["login_count"];
$signup_count = $signup_result->fetch_assoc()["signup_count"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #333;
            margin-bottom: 30px;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
            padding: 20px;
        }

        .stat {
            padding: 30px;
            background: linear-gradient(145deg, #f7f7f7, #e1e1e1);
            border-radius: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
        }

        .stat:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .stat h2 {
            margin: 0;
            color: #A64D79;
            font-size: 1.6em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat p {
            font-size: 2.5em;
            color: #333;
            margin: 20px 0;
            font-weight: bold;
        }

        .bar-graph {
            margin-top: 15px;
            height: 10px;
            background-color: #ddd;
            border-radius: 5px;
            position: relative;
        }

        .bar-graph .bar {
            height: 100%;
            border-radius: 5px;
            transition: width 0.5s ease-in-out;
        }

        /* Logins Bar */
        .login-bar {
            background-color: #4caf50;
            width: <?php echo ($login_count > 0) ? min($login_count * 5, 100) . '%' : '0%'; ?>;
        }

        /* Signups Bar */
        .signup-bar {
            background-color: #007bff;
            width: <?php echo ($signup_count > 0) ? min($signup_count * 5, 100) . '%' : '0%'; ?>;
        }

        /* New card hover animation */
        .stat .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2.5em;
            color: #A64D79;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .stat:hover .icon {
            opacity: 1;
        }
    </style>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>User Activity Report (<?php echo $today; ?>)</h1>
    <div class="stats">
        <div class="stat">
            <h2>Logins</h2>
            <p><?php echo $login_count; ?></p>
            <div class="bar-graph">
                <div class="bar login-bar"></div>
            </div>
        </div>
        <div class="stat">
            <h2>Signups</h2>
            <p><?php echo $signup_count; ?></p>
            <div class="bar-graph">
                <div class="bar signup-bar"></div>
            </div>
        </div>
    </div>

    <!-- Add Chart -->
    <div class="chart-container" style="margin-top: 50px; width: 80%; max-width: 800px; margin-left: auto; margin-right: auto;">
        <canvas id="userActivityChart"></canvas>
    </div>

    <script>
        // Get the login and signup counts from PHP
        var loginCount = <?php echo $login_count; ?>;
        var signupCount = <?php echo $signup_count; ?>;

        // Get the context of the canvas element
        var ctx = document.getElementById('userActivityChart').getContext('2d');

        // Create a bar chart
        var userActivityChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Logins', 'Signups'], // Labels for the bars
                datasets: [{
                    label: 'Count',
                    data: [loginCount, signupCount], // Data from PHP variables
                    backgroundColor: ['#4caf50', '#007bff'], // Colors for the bars
                    borderColor: ['#388e3c', '#0056b3'], // Border colors for the bars
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: Math.max(loginCount, signupCount) + 10 // Set the max value of the Y axis
                    }
                }
            }
        });
    </script>
</body>
</html>
