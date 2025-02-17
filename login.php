<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Page with Slider Animation</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #F2E8C6;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        p{
            padding-right:50px;
        }

        .container {
            display: flex;
            width: 80%;
            height: 80vh;
            background-color: #ffffff;
            box-shadow: 0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            animation: floatEffect 2s ease-in-out infinite;
        }

        @keyframes floatEffect {
            0% {
                transform: translateY(0);
                box-shadow: 0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8);
            }
            50% {
                transform: translateY(-10px);
                box-shadow: 0 15px 25px rgba(255, 0, 0, 0.8), 0 0 30px rgba(255, 0, 1);
            }
            100% {
                transform: translateY(0);
                box-shadow: 0 10px 20px rgba(255, 0, 0, 0.6), 0 0 25px rgba(255, 0, 0, 0.8);
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
            z-index: 2;
            position: relative;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            margin-bottom: 20px;
            padding-right:50px;
            color: #e05d5d;
        }

        .login-form input {
            width: 85%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button {
            width: 90%;
            padding: 10px;
            background-color: #e05d5d;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form button:hover {
            background-color: #d95353;
        }

        .login-form a {
            text-decoration: none;
            color: #e05d5d;
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
            display: none;
        }

        .container.slide {}
        .login-form.slide {
            transform: translateX(100%);
        }

        .image-section.slide {
            transform: translateX(-100%);
        }

        .image-section.show-welcome .welcome-text {
            display: block;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 90%;
                height: 90vh;
            }

            .login-form, .image-section {
                width: 100%;
                height: 50%;
                position: static;
                transform: translateX(0);
                transition: none;
            }

            .login-form {
                padding: 20px;
                width: 100%;
                box-shadow: none;
            }

            .image-section.slide, .login-form.slide {
                transform: translateY(0);
            }

            .image-section {
                order: -1;
            }

            .welcome-text {
                font-size: 3rem;
            }
        }

        @media (max-width: 480px) {
            .welcome-text {
                font-size: 2rem;
            }

            .login-form h2 {
                font-size: 1.5rem;
            }

            .login-form input {
                padding: 8px;
                margin: 8px 0;
            }

            .login-form button {
                font-size: 14px;
                padding: 8px;
            }

            .login-form a {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="login-form" id="loginForm">
            <h2>Login to our web</h2>
            <form action="loginbk.php" method="post">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" id="loginButton">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            <p>Forgot password? <a href="reset_password.php">Click here</a></p>
        </div>
        <div class="image-section" id="imageSection">
            <div class="welcome-text" id="welcomeText">.</div>
        </div>
    </div>

    <script>
        const usernameInput = document.getElementById('username');
        const loginForm = document.getElementById('loginForm');
        const imageSection = document.getElementById('imageSection');
        const container = document.getElementById('container');

        usernameInput.addEventListener('click', () => {
            loginForm.classList.add('slide');
            imageSection.classList.add('slide', 'show-welcome');
            container.classList.add('slide');
        });

        document.getElementById('loginButton').addEventListener('click', () => {
            imageSection.classList.remove('show-welcome');
            loginForm.classList.remove('slide');
            imageSection.classList.remove('slide');
            container.classList.remove('slide');
        });
    </script>
</body>
</html>
