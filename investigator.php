<?php
session_start();

// Check if the user is logged in and is an Investigator
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Investigator') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome, Investigator</title>
</head>
<body>
    <h1>Welcome, Investigator</h1>
    <p>This is the Investigator homepage.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
