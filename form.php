<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$dbname = 'crimeleon1';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the Reporting Person form data
    if (isset($_POST['reporting_last_name'])) {
        $sql = "INSERT INTO ReportingPerson (last_name, first_name, middle_name, age, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssii', $_POST['reporting_last_name'], $_POST['reporting_first_name'], $_POST['reporting_middle_name'], $_POST['reporting_age'], $_POST['reporting_address']);
        $stmt->execute();
    }

    // Process the Suspect's Data form data
    if (isset($_POST['suspect_last_name'])) {
        $sql = "INSERT INTO SuspectsData (last_name, first_name, middle_name, age, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssii', $_POST['suspect_last_name'], $_POST['suspect_first_name'], $_POST['suspect_middle_name'], $_POST['suspect_age'], $_POST['suspect_address']);
        $stmt->execute();
    }

    // Process the Children in Conflict with the Law form data
    if (isset($_POST['guardian_name'])) {
        $sql = "INSERT INTO ChildrenConflict (guardian_name, guardian_address) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $_POST['guardian_name'], $_POST['guardian_address']);
        $stmt->execute();
    }

    // Process the Victim's Data form data
    if (isset($_POST['victim_last_name'])) {
        $sql = "INSERT INTO VictimsData (last_name, first_name, middle_name, age, address) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssii', $_POST['victim_last_name'], $_POST['victim_first_name'], $_POST['victim_middle_name'], $_POST['victim_age'], $_POST['victim_address']);
        $stmt->execute();
    }

    // Process the Narrative of Incident form data
    if (isset($_POST['type_of_accident'])) {
        $sql = "INSERT INTO NarrativeIncident (type_of_accident, place_of_accident, description) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $_POST['type_of_accident'], $_POST['place_of_accident'], $_POST['description']);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Form</title>
<style> 
/* Basic styling reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #0a2242;
            color: #333;
            font-size: 16px;
        }

        .header {
            background-color: #bbc8e6; /* Dark background for the header */
            padding: 20px 0;
            text-align: right;
        }

        .header a { 
            color: #0a2242;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s;
        }

        .header a:hover {
            color: #007bff; /* Blue color for hover effect, can be adjusted */
        }

        form {
            max-width: 600px;
            margin: 40px auto;
            background-color: #bbc8e6;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h3 {
            background-color: #0a2242;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        h3:hover {
            background-color: #555;
        }

        div[id^="reportingPerson"], div[id^="suspectsData"], div[id^="childrenConflict"], div[id^="victimsData"], div[id^="narrativeIncident"] {
            padding: 10px;
            margin-top: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 4    px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus, input[type="number"]:focus, textarea:focus {
            border-color: #333;
            outline: none;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #0a2242;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

</style>   
</head>
<body>
<div class="header">
        <a href="police.php">HOME</a>
        <a href="form.php">FORM</a>
        <a href="record.php">RECORD</a>
        <a href="about.php">ABOUT US</a>
        <a href="logout.php">LOGOUT</a>
    </div>
    <!-- Reporting Person Form -->
    <form method="post" action="form.php">
        <h3 onclick="toggleForm('reportingPerson')">A. Reporting Person</h3>
        <div id="reportingPerson" style="display:none;">
            Last Name: <input type="text" name="reporting_last_name" required><br>
            First Name: <input type="text" name="reporting_first_name" required><br>
            Middle Name: <input type="text" name="reporting_middle_name" required><br>
            Age: <input type="number" name="reporting_age" required><br>
            Address: <textarea name="reporting_address" required></textarea><br>
        </div>

        <h3 onclick="toggleForm('suspectsData')">B. Suspect's Data</h3>
        <div id="suspectsData" style="display:none;">
            Last Name: <input type="text" name="suspect_last_name" required><br>
            First Name: <input type="text" name="suspect_first_name" required><br>
            Middle Name: <input type="text" name="suspect_middle_name" required><br>
            Age: <input type="number" name="suspect_age" required><br>
            Address: <textarea name="suspect_address" required></textarea><br>
        </div>

        <h3 onclick="toggleForm('childrenConflict')">For Children in Conflict with the Law</h3>
        <div id="childrenConflict" style="display:none;">
            Guardian Name: <input type="text" name="guardian_name" required><br>
            Guardian Address: <textarea name="guardian_address" required></textarea><br>
        </div>

        <h3 onclick="toggleForm('victimsData')">C. Victim's Data</h3>
        <div id="victimsData" style="display:none;">
            Last Name: <input type="text" name="victim_last_name" required><br>
            First Name: <input type="text" name="victim_first_name" required><br>
            Middle Name: <input type="text" name="victim_middle_name" required><br>
            Age: <input type="number" name="victim_age" required><br>
            Address: <textarea name="victim_address" required></textarea><br>
        </div>

        <h3 onclick="toggleForm('narrativeIncident')">D. Narrative of Incident</h3>
        <div id="narrativeIncident" style="display:none;">
            Type of Accident: <input type="text" name="type_of_accident" required><br>
            Place of Accident: <input type="text" name="place_of_accident" required><br>
            Description: <textarea name="description" required></textarea><br>
        </div>

        <input type="submit" value="Submit">
    </form>

    <script>
        function toggleForm(formId) {
            let form = document.getElementById(formId);
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</body>
</html>
