<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crimeleon"; // Change this to your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in the user database
    $sql = "SELECT * FROM users WHERE gov_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Determine user type based on email domain
            $userType = '';
            if (strpos($email, '@admin.pnp.gov.ph') !== false) {
                $userType = 'Admin';
            } elseif (strpos($email, '@investigator.pnp.gov.ph') !== false) {
                $userType = 'Investigator';
            } elseif (strpos($email, '@police.pnp.gov.ph') !== false) {
                $userType = 'Police';
            }

            // Set user type in session
            $_SESSION['user_type'] = $userType;
            $_SESSION['user_id'] = $row['id']; // You may want to store the user's ID for future use
            $_SESSION['firstname'] = $row['firstname']; // Assuming 'firstname' is the column name in your database
            $_SESSION['lastname'] = $row['lastname']; // Assuming 'lastname' is the column name in your database
            header("Location: $userType.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid password. Please try again.";
            header("Location: login.php");  // Redirect back to the login page to show the error
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid email. Please try again.";
        header("Location: login.php");  // Redirect back to the login page to show the error
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
