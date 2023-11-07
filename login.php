<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
         @import url('https://fonts.cdnfonts.com/css/lovelo?styles=25962');
    </style>
                
    <style>
        body {
            font-family: 'Lovelo', sans-serif;
            background-color: #bbc8e6;
            margin: 0;
            overflow: hidden; /* Prevent scrolling */
        }

        .container {
            display: flex;
            width: 100vw; /* Take the full viewport width */
            height: 100vh; /* Take the full viewport height */
        }

        .logo-container {
            flex: 1; 
            background-color: #bbc8e6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container img {
            width: 80%;
            max-height: 80%;
        }

        .login-container {
            flex: 1; 
            padding: 50px;
            background-color: #0a2242;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
        text-align: center;
        margin-bottom: 24px;
        color: #bbc8e6;
        font-size: 50px; /* Increase the font size */
        font-weight: bold; /* Make the text bold */
        }

        label {
        display: block;
        text-align: center; /* Center the label text */
        margin-bottom: 10px; /* Adjust margin to move the label closer to the input */
        color: #bbc8e6;
        font-weight: bold; /* Make the label text bold for emphasis */
        }

        input {
        width: 70%; /* Reduced width of the input fields */
        padding: 10px; /* Reduced padding for a more compact look */
        margin: 0 auto 16px auto; /* Center the input fields and provide margin at the bottom */
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        display: block; /* To make use of the automatic margins for centering */
        }

        button {
        width: 40%; /* Reduced width of the button */
        padding: 10px 20px; /* Adjusted padding for smaller button size */
        background-color: #bbc8e6;
        color: #0a2242;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: block;  /* Set button to block for centering */
        margin: 20px auto; /* Center the button horizontally and give it some vertical space */
        }

        button:hover {
        background-color: #003366;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="logo.png" alt="Logo">
        </div>
        <div class="login-container">
            <h2>LOG-IN</h2>
            <form method="post" action="process_login.php">
                <label>Email</label>
                <input type="email" name="email" required>
                <label>Password</label>
                <input type="password" name="password" required>
                <button type="submit" name="login">Login</button>
                <?php
                session_start(); // Start the session at the beginning
                if (isset($_SESSION['error'])) {
                    echo "<p style='color: red; text-align: center;'>" . $_SESSION['error'] . "</p>"; // Display the error message
                    unset($_SESSION['error']); // Clear the error message for subsequent requests
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
