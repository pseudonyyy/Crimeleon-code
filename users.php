<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crimeleon";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header("Location: login.php");
    exit();
}

if (isset($_POST['signup'])) {
    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Passwords do not match!";
        return; // stop the script from proceeding further
    }   
}


if (isset($_POST['signup'])) {
    $sql = "INSERT INTO users (firstname, middlename, lastname, address, contact, license_idno, position, gov_email, password, badge_no, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    
    $stmt = $conn->prepare($sql);
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt->bind_param("ssssssssss", $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['address'], $_POST['contact'], $_POST['license_idno'], $_POST['position'], $_POST['gov_email'], $hashedPassword, $_POST['badge_no']);

    if ($stmt->execute()) {
        echo "User registration successful.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRIMELEON - User Management</title>
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


        .dashboard {
            text-align: right;
            padding: 10px;
        }

        .dashboard a {
            text-decoration: none;
            margin: 0 10px;
            color: #51a1e3;
        }

        .content {
            max-width: 800px;
            margin: 40px auto;
            background: #c3d1e9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .content h2, .content h3 {
            color: #0a2242;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #e0e0e0;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #0a2242;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #c3d1e9 ;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 97%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #2f3b52;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #51a1e3;
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

    <div class="content">
        <h2>User Management</h2>

        <!-- Display User List -->
        <h3>User List</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT id, CONCAT(firstname, ' ', middlename, ' ', lastname) as name, gov_email, created_at FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["gov_email"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "<td><a href='edit_user.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_user.php?id=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }
            ?>
        </table>

        <!-- User Creation Form -->
        <h3>Create New User</h3>
        <form method="post" action="">
            <label>First Name:</label>
            <input type="text" name="firstname" required>

            <label>Middle Name:</label>
            <input type="text" name="middlename">

            <label>Last Name:</label>
            <input type="text" name="lastname" required>

            <label>Address:</label>
            <input type="text" name="address" required>

            <label>Contact:</label>
            <input type="text" name="contact" required>

            <label>Licensed ID Number:</label>
            <input type="text" name="license_idno" required>

            <label>Position:</label>
            <input type="text" name="position" required>

            <label>Government Email:</label>
            <input type="email" name="gov_email" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" required>

            <label>Badge Number:</label>
            <input type="text" name="badge_no" required>

            <button type="submit" name="signup">Create User</button>
        </form>
    </div>
</body>
</html>
