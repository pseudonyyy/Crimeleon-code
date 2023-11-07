<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crimeleon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit_complaint'])) {

    $reporting_family_name = isset($_POST['reporting_family_name']) ? $_POST['reporting_family_name'] : '';
$reporting_first_name = isset($_POST['reporting_first_name']) ? $_POST['reporting_first_name'] : '';
$reporting_middle_name = isset($_POST['reporting_middle_name']) ? $_POST['reporting_middle_name'] : '';
$reporting_citizenship = isset($_POST['reporting_citizenship']) ? $_POST['reporting_citizenship'] : '';
$reporting_sex = isset($_POST['reporting_sex']) ? $_POST['reporting_sex'] : '';
$reporting_civil_status = isset($_POST['reporting_civil_status']) ? $_POST['reporting_civil_status'] : '';
$reporting_birth_date = isset($_POST['reporting_birth_date']) ? $_POST['reporting_birth_date'] : '';
$reporting_age = isset($_POST['reporting_age']) ? $_POST['reporting_age'] : '';
$reporting_barangay = isset($_POST['reporting_barangay']) ? $_POST['reporting_barangay'] : '';
$reporting_town_city = isset($_POST['reporting_town_city']) ? $_POST['reporting_town_city'] : '';
$reporting_province = isset($_POST['reporting_province']) ? $_POST['reporting_province'] : '';

$suspect_family_name = isset($_POST['suspect_family_name']) ? $_POST['suspect_family_name'] : '';
$suspect_first_name = isset($_POST['suspect_first_name']) ? $_POST['suspect_first_name'] : '';
$suspect_middle_name = isset($_POST['suspect_middle_name']) ? $_POST['suspect_middle_name'] : '';
$suspect_citizenship = isset($_POST['suspect_citizenship']) ? $_POST['suspect_citizenship'] : '';
$suspect_sex = isset($_POST['suspect_sex']) ? $_POST['suspect_sex'] : '';
$suspect_civil_status = isset($_POST['suspect_civil_status']) ? $_POST['suspect_civil_status'] : '';
$suspect_birth_date = isset($_POST['suspect_birth_date']) ? $_POST['suspect_birth_date'] : '';
$suspect_age = isset($_POST['suspect_age']) ? $_POST['suspect_age'] : '';
$suspect_barangay = isset($_POST['suspect_barangay']) ? $_POST['suspect_barangay'] : '';
$suspect_town_city = isset($_POST['suspect_town_city']) ? $_POST['suspect_town_city'] : '';
$suspect_province = isset($_POST['suspect_province']) ? $_POST['suspect_province'] : '';

$guardian_name = isset($_POST['guardian_name']) ? $_POST['guardian_name'] : '';
$guardian_address = isset($_POST['guardian_address']) ? $_POST['guardian_address'] : '';
$guardian_home_phone = isset($_POST['guardian_home_phone']) ? $_POST['guardian_home_phone'] : '';
$guardian_mobile_phone = isset($_POST['guardian_mobile_phone']) ? $_POST['guardian_mobile_phone'] : '';

$victim_family_name = isset($_POST['victim_family_name']) ? $_POST['victim_family_name'] : '';
$victim_first_name = isset($_POST['victim_first_name']) ? $_POST['victim_first_name'] : '';
$victim_middle_name = isset($_POST['victim_middle_name']) ? $_POST['victim_middle_name'] : '';
$victim_citizenship = isset($_POST['victim_citizenship']) ? $_POST['victim_citizenship'] : '';
$victim_sex = isset($_POST['victim_sex']) ? $_POST['victim_sex'] : '';
$victim_civil_status = isset($_POST['victim_civil_status']) ? $_POST['victim_civil_status'] : '';
$victim_birth_date = isset($_POST['victim_birth_date']) ? $_POST['victim_birth_date'] : '';
$victim_age = isset($_POST['victim_age']) ? $_POST['victim_age'] : '';
$victim_barangay = isset($_POST['victim_barangay']) ? $_POST['victim_barangay'] : '';
$victim_town_city = isset($_POST['victim_town_city']) ? $_POST['victim_town_city'] : '';
$victim_province = isset($_POST['victim_province']) ? $_POST['victim_province'] : '';

$incident_type = isset($_POST['incident_type']) ? $_POST['incident_type'] : '';
$incident_datetime = isset($_POST['incident_datetime']) ? $_POST['incident_datetime'] : '';
$incident_place = isset($_POST['incident_place']) ? $_POST['incident_place'] : '';
$incident_description = isset($_POST['incident_description']) ? $_POST['incident_description'] : '';

    
    $sql = "INSERT INTO reports (
        reporting_family_name, reporting_first_name, reporting_middle_name,
        reporting_citizenship, reporting_sex, reporting_civil_status,
        reporting_birth_date, reporting_age, reporting_barangay,
        reporting_town_city, reporting_province,
        suspect_family_name, suspect_first_name, suspect_middle_name,
        suspect_citizenship, suspect_sex, suspect_civil_status,
        suspect_birth_date, suspect_age, suspect_barangay,
        suspect_town_city, suspect_province,
        guardian_name, guardian_address, guardian_home_phone, guardian_mobile_phone,
        victim_family_name, victim_first_name, victim_middle_name,
        victim_citizenship, victim_sex, victim_civil_status,
        victim_birth_date, victim_age, victim_barangay,
        victim_town_city, victim_province,
        incident_type, incident_datetime, incident_place, incident_description
        ) VALUES (?, ?, ?, ..., ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $conn->error);
    }

    $bind = $stmt->bind_param(
        "sssssssssssssssssssssssssssssssssssssssssss",
        $reporting_family_name, 
        $reporting_first_name, 
        $reporting_middle_name,
        $reporting_citizenship, 
        $reporting_sex, 
        $reporting_civil_status, 
        $reporting_birth_date, 
        $reporting_age, 
        $reporting_barangay, 
        $reporting_town_city, 
        $reporting_province, 
        $suspect_family_name, 
        $suspect_first_name, 
        $suspect_middle_name, 
        $suspect_citizenship, 
        $suspect_sex, 
        $suspect_civil_status, 
        $suspect_birth_date, 
        $suspect_age, 
        $suspect_barangay, 
        $suspect_town_city, 
        $suspect_province, 
        $guardian_name, 
        $guardian_address, 
        $guardian_home_phone, 
        $guardian_mobile_phone, 
        $victim_family_name, 
        $victim_first_name, 
        $victim_middle_name, 
        $victim_citizenship, 
        $victim_sex, 
        $victim_civil_status, 
        $victim_birth_date, 
        $victim_age, 
        $victim_barangay, 
        $victim_town_city, 
        $victim_province, 
        $incident_type, 
        $incident_datetime, 
        $incident_place, 
        $incident_description
    );
    

    if ($bind === false) {
        die("Error binding parameters: " . $stmt->error);
    }

    if ($stmt->execute()) {
        echo "Complaint successfully submitted!";
    } else {
        echo "Error submitting complaint: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
