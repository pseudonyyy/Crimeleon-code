<?php
session_start();

// Check if the user is logged in and is an Admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRIMELEON - Home</title>
    <style>
        @import url('https://fonts.cdnfonts.com/css/lovelo?styles=25962');
    </style>
    <style>
        body {
            font-family: 'Lovelo', sans-serif;
            background-color: #0a2242;
            margin: 0;
            padding: 0;
        }

        .header {
        background-color: #bbc8e6;
        padding: 20px 0;
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
        }

        .header img {
            margin-left: 15px;
            max-height: 80px;
        }

        .brand-text {
            margin-left: 10px;
            font-size: 50px;
            color: #0a2242;
            vertical-align: middle;
        }

        .header a,
        .dropdown img {
            color: #0a2242;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            font-size: 25px;
            transition: color 0.3s;
            vertical-align: middle;
        }

        .header-links {
        margin-left: auto;
        }

        .header a:hover {
            color: #007bff; /* Blue color for hover effect, can be adjusted */
        }

        .image-section {
        background-image: url('cbg.png');
        background-size: cover;
        background-position: center;
        position: relative;
        height: 400px; /* You can adjust this according to your image's height or your preference */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image-section::before {
    content: "";
    background-image: url('logo2.png');
    opacity: 0.9;  /* Adjust for desired opacity */
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: center;
    z-index: -1;  /* Makes sure it's behind the text */
    }
    
    .overlay-text {
        text-align: center;
        color: #d9e4ff; 
        z-index: 1;
    }

    .overlay-text h1, .overlay-text p, .overlay-text h2 {
        margin: 1px 0;
    }

    .overlay-text h1 {
        font-size: 130px; /* Adjust font size as needed */
    }

    .overlay-text p {
        font-size: 32px; /* Adjust font size as needed */
    }

    .overlay-text h2 {
        font-size: 32px; /* Adjust font size as needed */
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #bbc8e6;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: #0a2242;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .admin-section {
    display: flex;
    align-items: center;
    justify-content: center;
    height: auto; /* Removing the fixed height */
    font-size: 50px; 
    font-weight: bold;
    background-color: #617392; /* Color similar to the one in the image */
    border-radius: 50px; /* Making it rounded. Adjust as necessary. */
    padding: 15px 30px; /* Adding some padding to give space between the text and the circle's edge */
    width: max-content; /* Making the width just large enough for the content */
    margin: 0 auto; /* Centering the circle horizontally */
    margin-top: 50px; /* Adjusts the space above the button */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Optional: Add a subtle shadow for depth */
    }

    .admin-section span {
    color: #d9e4ff; /* Text color similar to the one in the image */
    }

    .user-name {
    color: #0a2242;
    margin: 0 15px;
    font-weight: bold;
    font-size: 25px;
    vertical-align: middle;
    }

    </style>
</head>
<body>

<div class="header">
    <img src="logo2.png" alt="Logo">
    <span class="brand-text">CRIMELEON</span>
    <div class="header-links">
        <a href="admin.php">HOME</a>
        <a href="users.php">USERS</a>
        <a href="record.php">RECORD</a>
        <a href="about.php">ABOUT US</a>
        <span class="user-name"><?php echo htmlspecialchars($_SESSION['firstname'] . " " . $_SESSION['lastname']); ?></span>
        <div class="dropdown">
            <img src="logout.png" alt="Logout Icon" style="cursor: pointer; width: 50px; height: 50px;">
            <div class="dropdown-content">
                <a href="logout.php">LOGOUT</a>
            </div>
        </div>
    </div>
</div>


<section class="image-section">
    <div class="overlay-text">
        <h1>CRIMELEON</h1>
        <p>Citizen's Complaints report</p>
        <h2>management system</h2>
    </div>
</section>

<section class="admin-section">
    <span>ADMIN</span>
</section>

<div class="content">
        <!-- Your admin-specific content goes here -->
    </div>
</body>
</html>
