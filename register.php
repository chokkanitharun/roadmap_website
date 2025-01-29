
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color:#F2E8C6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* Prevent scrolling during animation */
        }

        .container {
    display: flex;
    width: 80%;
    height: 80vh;
    background-color: #ffffff;
    box-shadow: 0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8); /* Shiny red effect */
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    animation: floatEffect 2s ease-in-out infinite; /* Animation to create the floating effect */
}

@keyframes floatEffect {
    0% {
        transform: translateY(0);
        box-shadow: 0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8);
    }
    50% {
        transform: translateY(-10px); /* Moves the container up */
        box-shadow: 0 15px 25px rgba(255, 0, 0, 0.8), 0 0 30px rgba(255, 0, 0, 1); /* Stronger shadow */
    }
    100% {
        transform: translateY(0); /* Returns the container to its original position */
        box-shadow: 0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8); /* Original shadow */
    }
}


        .login-form {
            width: 40%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: transform 0.6s ease-in-out;
            z-index: 2; /* Ensure login form is above the image section */
            position: relative;
            background-color: #ffffff; /* Set background color */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Box shadow for the login form */
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #e05d5dff;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #e05d5dff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form button:hover {
            background-color: #e05d5dff;
        }

        .login-form a {
            text-decoration: none;
            color: #e05d5dff;
            font-size: 14px;
        }

        .image-section {
            width: 60%;
            background: url('reg.png') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: transform 0.6s ease-in-out;
        }

        .welcome-text {
            position: absolute;
            font-size: 4rem;
            color: #fff;
            display: none; /* Initially hidden */
        }

        /* Sliding animation classes */
        .container.slide {
            /* No movement required */
        }

        .login-form.slide {
            transform: translateX(100%); /* Move login form to image side */
        }

        .image-section.slide {
            transform: translateX(-100%); /* Move image section to login form side */
        }

        .image-section.show-welcome .welcome-text {
            display: block; /* Show welcome text when class is active */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column; /* Stack elements vertically */
                width: 90%;
                height: 90vh;
            }

            .login-form, .image-section {
                width: 100%; /* Full width on mobile */
                height: 50%; /* Half height for each section */
                position: static; /* Remove absolute positioning */
                transform: translateX(0); /* Reset transformations */
                transition: none; /* Disable sliding animation for mobile */
            }

            .login-form {
                padding: 20px; /* Smaller padding */
                width: 100%; /* Full width for login form */
                box-shadow: none; /* Remove box shadow */
            }

            .image-section.slide, .login-form.slide {
                transform: translateY(0); /* Disable sliding animation on mobile */
            }

            .image-section {
                order: -1; /* Display image-section first */
            }

            .welcome-text {
                font-size: 3rem; /* Smaller font size */
            }
        }

        @media (max-width: 480px) {
            .welcome-text {
                font-size: 2rem; /* Smaller font size */
            }

            .login-form h2 {
                font-size: 1.5rem; /* Smaller font size for heading */
            }

            .login-form input {
                padding: 8px; /* Smaller padding */
                margin: 8px 0; /* Smaller margin */
            }

            .login-form button {
                font-size: 14px; /* Smaller font size */
                padding: 8px; /* Smaller padding */
            }

            .login-form a {
                font-size: 12px; /* Smaller font size for link */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Register</h2>
            <form action="registerbk.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="email" name="email" placeholder="email" required>
                
                <button type="submit">Register</button>
            </form>
           
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
        <div class="image-section" id="imageSection">
            <div class="welcome-text" id="welcomeText">Welcome</div>
        </div>
    </div>
    <script>
         const usernameInput = document.getElementById('username');
        const loginForm = document.getElementById('loginForm');
        const imageSection = document.getElementById('imageSection');
        const container = document.getElementById('container');

        // Show welcome text and slide sections on username click
        usernameInput.addEventListener('click', () => {
            // Add both 'slide' and 'show-welcome' classes
            loginForm.classList.add('slide');
            imageSection.classList.add('slide', 'show-welcome');
            container.classList.add('slide');
        });

        // Hide welcome text and reset sliding on login button click
        document.getElementById('loginButton').addEventListener('click', () => {
            // Remove the 'show-welcome' class to hide welcome text
            imageSection.classList.remove('show-welcome');

            // Reset the sliding animation, remove 'slide' class
            loginForm.classList.remove('slide');
            imageSection.classList.remove('slide');
            container.classList.remove('slide');
            
        });
    </script>

</body>
</html>
