<?php
session_start();    
    $host = 'localhost'; 
    $username = 'root'; 
    $password = ''; 
    $dbname = 'crimeleon1';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from all the tables
    // $reportingPerson = $conn->query("SELECT * FROM ReportingPerson");
    // $suspectsData = $conn->query("SELECT * FROM SuspectsData");
    // $childrenConflict = $conn->query("SELECT * FROM ChildrenConflict");
    // $victimsData = $conn->query("SELECT * FROM VictimsData");
    // $narrativeIncident = $conn->query("SELECT * FROM NarrativeIncident");
    // ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>CRIMELEON - Records</title>
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

        table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #e0e0e0;
        }

        table td, table th {
        color: #fff;
        }

        th, td {
            padding: 8px 15px;
            text-align: left;
        }

        th {
            background-color: #bbc8e6;
        }

        tr:hover {
        background-color: rgba(232, 232, 232, 0.4); /* 0.7 is 70% opacity */
        }

        h1,h2,h3,h4 {
            text-align: center;
            color: #e0e0e0;
            margin-top: 40px;
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

<title>Report Form</title>
</head>
<body>

<form action="/submit_form" method="post">

                <!-- ITEM A  -->
  <h1>ITEM "A" - REPORTING PERSON</h1>
  
  <label for="familyName">Family Name:</label>
  <input type="text" id="familyName" name="familyName" required>

  <label for="firstName">First Name:</label>
  <input type="text" id="firstName" name="firstName" required>

  <label for="middleName">Middle Name:</label>
  <input type="text" id="middleName" name="middleName">

  <label for="qualifier">Qualifier:</label>
  <input type="text" id="qualifier" name="qualifier">

  <label for="nickname">Nickname:</label>
  <input type="text" id="nickname" name="nickname">

  <label for="citizenship">Citizenship:</label>
  <input type="text" id="citizenship" name="citizenship" required>

  <label for="sexGender">Sex/Gender:</label>
  <select id="sexGender" name="sexGender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
  </select>

  <label for="civilStatus">Civil Status:</label>
  <select id="civilStatus" name="civilStatus">
    <option value="single">Single</option>
    <option value="married">Married</option>
    <option value="widowed">Widowed</option>
    <option value="separated">Separated</option>
    <option value="divorced">Divorced</option>
  </select>

  <label for="dob">Date of Birth (MM/DD/YY):</label>
  <input type="text" id="dob" name="dob" placeholder="MM/DD/YY" required>

  <label for="age">Age:</label>
  <input type="number" id="age" name="age" required>

  <label for="placeOfBirth">Place of Birth:</label>
  <input type="text" id="placeOfBirth" name="placeOfBirth" required>

  <label for="homePhone">Home Phone:</label>
  <input type="tel" id="homePhone" name="homePhone">

  <label for="mobilePhone">Mobile Phone:</label>
  <input type="tel" id="mobilePhone" name="mobilePhone" required>
<!-- CURRENT ADDRESS -->
    <label for="currentHouseNumber">Current Address(House Number/Street):</label>
    <input type="text" id="currentHouseNumber" name="currentAddressHouseNumber" required>

    <label for="currentVillage">Village/Sitio:</label>
    <input type="text" id="currentVillage" name="currentAddressVillage" required>

    <label for="currentBarangay">Barangay:</label>
    <input type="text" id="currentBarangay" name="currentAddressBarangay" required>

    <label for="currentTownCity">Town/City:</label>
    <input type="text" id="currentTownCity" name="currentAddressTownCity" required>

    <label for="currentProvince">Province:</label>
    <input type="text" id="currentProvince" name="currentAddressProvince" required>
<!-- OTHER ADDRESS -->
    <label for="otherHouseNumber">Other Address(House Number/Street):</label>
    <input type="text" id="otherHouseNumber" name="otherAddressHouseNumber">

    <label for="otherVillage">Village/Sitio:</label>
    <input type="text" id="otherVillage" name="otherAddressVillage">

    <label for="otherBarangay">Barangay:</label>
    <input type="text" id="otherBarangay" name="otherAddressBarangay">

    <label for="otherTownCity">Town/City:</label>
    <input type="text" id="otherTownCity" name="otherAddressTownCity">

    <label for="otherProvince">Province:</label>
    <input type="text" id="otherProvince" name="otherAddressProvince">

    <label for="highestEducationalAttainment">Highest Educational Attainment:</label>
    <input type="text" id="highestEducationalAttainment" name="highestEducationalAttainment">

    <label for="occupation">Occupation:</label>
    <input type="text" id="occupation" name="occupation" required>

    <label for="idCardPresented">ID Card Presented:</label>
    <input type="text" id="idCardPresented" name="idCardPresented" required>

    <label for="emailAddress">Email Address:</label>
    <input type="email" id="emailAddress" name="emailAddress">
    

                        <!-- ITEM B  -->
  <h1>ITEM "B" - SUSPECT’S DATA</h1>
  <label for="familyName">Family Name:</label>
  <input type="text" id="familyName" name="familyName" required>

  <label for="firstName">First Name:</label>
  <input type="text" id="firstName" name="firstName" required>

  <label for="middleName">Middle Name:</label>
  <input type="text" id="middleName" name="middleName">

  <label for="qualifier">Qualifier:</label>
  <input type="text" id="qualifier" name="qualifier">

  <label for="nickname">Nickname:</label>
  <input type="text" id="nickname" name="nickname">

  <label for="citizenship">Citizenship:</label>
  <input type="text" id="citizenship" name="citizenship" required>

  <label for="sexGender">Sex/Gender:</label>
  <select id="sexGender" name="sexGender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
  </select>

  <label for="civilStatus">Civil Status:</label>
  <select id="civilStatus" name="civilStatus">
    <option value="single">Single</option>
    <option value="married">Married</option>
    <option value="widowed">Widowed</option>
    <option value="separated">Separated</option>
    <option value="divorced">Divorced</option>
  </select>

  <label for="dob">Date of Birth (MM/DD/YY):</label>
  <input type="text" id="dob" name="dob" placeholder="MM/DD/YY" required>

  <label for="age">Age:</label>
  <input type="number" id="age" name="age" required>

  <label for="placeOfBirth">Place of Birth:</label>
  <input type="text" id="placeOfBirth" name="placeOfBirth" required>

  <label for="homePhone">Home Phone:</label>
  <input type="tel" id="homePhone" name="homePhone">

  <label for="mobilePhone">Mobile Phone:</label>
  <input type="tel" id="mobilePhone" name="mobilePhone" required>
<!-- CURRENT ADDRESS -->
    <label for="currentHouseNumber">Current Address(House Number/Street):</label>
    <input type="text" id="currentHouseNumber" name="currentAddressHouseNumber" required>

    <label for="currentVillage">Village/Sitio:</label>
    <input type="text" id="currentVillage" name="currentAddressVillage" required>

    <label for="currentBarangay">Barangay:</label>
    <input type="text" id="currentBarangay" name="currentAddressBarangay" required>

    <label for="currentTownCity">Town/City:</label>
    <input type="text" id="currentTownCity" name="currentAddressTownCity" required>

    <label for="currentProvince">Province:</label>
    <input type="text" id="currentProvince" name="currentAddressProvince" required>
<!-- OTHER ADDRESS -->
    <label for="otherHouseNumber">Other Address(House Number/Street):</label>
    <input type="text" id="otherHouseNumber" name="otherAddressHouseNumber">

    <label for="otherVillage">Village/Sitio:</label>
    <input type="text" id="otherVillage" name="otherAddressVillage">

    <label for="otherBarangay">Barangay:</label>
    <input type="text" id="otherBarangay" name="otherAddressBarangay">

    <label for="otherTownCity">Town/City:</label>
    <input type="text" id="otherTownCity" name="otherAddressTownCity">

    <label for="otherProvince">Province:</label>
    <input type="text" id="otherProvince" name="otherAddressProvince">

    <label for="highestEducationalAttainment">Highest Educational Attainment:</label>
    <input type="text" id="highestEducationalAttainment" name="highestEducationalAttainment">

    <label for="occupation">Occupation:</label>
    <input type="text" id="occupation" name="occupation" required>

    <label for="idCardPresented">ID Card Presented:</label>
    <input type="text" id="idCardPresented" name="idCardPresented" required>

    <label for="emailAddress">Email Address:</label>
    <input type="email" id="emailAddress" name="emailAddress">
    <label for="rank">Rank:</label>
    <input type="text" id="rank" name="rank">

    <label for="unitAssignment">Unit Assignment:</label>
    <input type="text" id="unitAssignment" name="unitAssignment">

    <label for="groupAffiliation">Group Affiliation:</label>
    <input type="text" id="groupAffiliation" name="groupAffiliation">

    <label for="criminalRecord">With Previous Criminal Record?</label>
    <label><input type="radio" name="criminalRecord" value="yes"> Yes</label>
    <label><input type="radio" name="criminalRecord" value="no" checked> No</label>

    <label for="criminalRecordDetails">If Yes, Please Specify:</label>
    <textarea id="criminalRecordDetails" name="criminalRecordDetails"></textarea>

    <label for="statusPreviousCase">Status of Previous Case:</label>
    <input type="text" id="statusPreviousCase" name="statusPreviousCase">

    <label for="height">Height:</label>
    <input type="text" id="height" name="height">

    <label for="weight">Weight:</label>
    <input type="text" id="weight" name="weight">

    <label for="built">Built:</label>
    <input type="text" id="built" name="built">

    <label for="colorOfEyes">Color of Eyes:</label>
    <input type="text" id="colorOfEyes" name="colorOfEyes">

    <label for="descriptionOfEyes">Description of Eyes:</label>
    <input type="text" id="descriptionOfEyes" name="descriptionOfEyes">

    <label for="colorOfHair">Color of Hair:</label>
    <input type="text" id="colorOfHair" name="colorOfHair">

    <label for="descriptionOfHair">Description of Hair:</label>
    <input type="text" id="descriptionOfHair" name="descriptionOfHair">

    <label for="underTheInfluence">Under the Influence:</label>
    <label><input type="radio" name="underTheInfluence" value="no" checked> No</label>
    <label><input type="radio" name="underTheInfluence" value="drugs"> Drugs</label>
    <label><input type="radio" name="underTheInfluence" value="liquor"> Liquor</label>
    <label><input type="radio" name="underTheInfluence" value="others"> Others</label>

                    <!-- CHILD CONFLICT  -->

<h2>Children in Conflict with the Law</h2>
    <label for="guardianName">Name of Guardian:</label>
    <input type="text" id="guardianName" name="guardianName">

    <label for="guardianAddress">Guardian Address:</label>
    <input type="text" id="guardianAddress" name="guardianAddress">

    <label for="guardianHomePhone">Home Phone:</label>
    <input type="tel" id="guardianHomePhone" name="guardianHomePhone">

    <label for="guardianMobilePhone">Mobile Phone:</label>
    <input type="tel" id="guardianMobilePhone" name="guardianMobilePhone">

                    <!-- ITEM B  -->

    <h1>ITEM “C” – VICTIM’S DATA</h1>
  
  <label for="familyName">Family Name:</label>
  <input type="text" id="familyName" name="familyName" required>

  <label for="firstName">First Name:</label>
  <input type="text" id="firstName" name="firstName" required>

  <label for="middleName">Middle Name:</label>
  <input type="text" id="middleName" name="middleName">

  <label for="qualifier">Qualifier:</label>
  <input type="text" id="qualifier" name="qualifier">

  <label for="nickname">Nickname:</label>
  <input type="text" id="nickname" name="nickname">

  <label for="citizenship">Citizenship:</label>
  <input type="text" id="citizenship" name="citizenship" required>

  <label for="sexGender">Sex/Gender:</label>
  <select id="sexGender" name="sexGender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
  </select>

  <label for="civilStatus">Civil Status:</label>
  <select id="civilStatus" name="civilStatus">
    <option value="single">Single</option>
    <option value="married">Married</option>
    <option value="widowed">Widowed</option>
    <option value="separated">Separated</option>
    <option value="divorced">Divorced</option>
  </select>

  <label for="dob">Date of Birth (MM/DD/YY):</label>
  <input type="text" id="dob" name="dob" placeholder="MM/DD/YY" required>

  <label for="age">Age:</label>
  <input type="number" id="age" name="age" required>

  <label for="placeOfBirth">Place of Birth:</label>
  <input type="text" id="placeOfBirth" name="placeOfBirth" required>

  <label for="homePhone">Home Phone:</label>
  <input type="tel" id="homePhone" name="homePhone">

  <label for="mobilePhone">Mobile Phone:</label>
  <input type="tel" id="mobilePhone" name="mobilePhone" required>
<!-- CURRENT ADDRESS -->
    <label for="currentHouseNumber">Current Address(House Number/Street):</label>
    <input type="text" id="currentHouseNumber" name="currentAddressHouseNumber" required>

    <label for="currentVillage">Village/Sitio:</label>
    <input type="text" id="currentVillage" name="currentAddressVillage" required>

    <label for="currentBarangay">Barangay:</label>
    <input type="text" id="currentBarangay" name="currentAddressBarangay" required>

    <label for="currentTownCity">Town/City:</label>
    <input type="text" id="currentTownCity" name="currentAddressTownCity" required>

    <label for="currentProvince">Province:</label>
    <input type="text" id="currentProvince" name="currentAddressProvince" required>
<!-- OTHER ADDRESS -->
    <label for="otherHouseNumber">Other Address(House Number/Street):</label>
    <input type="text" id="otherHouseNumber" name="otherAddressHouseNumber">

    <label for="otherVillage">Village/Sitio:</label>
    <input type="text" id="otherVillage" name="otherAddressVillage">

    <label for="otherBarangay">Barangay:</label>
    <input type="text" id="otherBarangay" name="otherAddressBarangay">

    <label for="otherTownCity">Town/City:</label>
    <input type="text" id="otherTownCity" name="otherAddressTownCity">

    <label for="otherProvince">Province:</label>
    <input type="text" id="otherProvince" name="otherAddressProvince">

    <label for="highestEducationalAttainment">Highest Educational Attainment:</label>
    <input type="text" id="highestEducationalAttainment" name="highestEducationalAttainment">

    <label for="occupation">Occupation:</label>
    <input type="text" id="occupation" name="occupation" required>

    <label for="idCardPresented">ID Card Presented:</label>
    <input type="text" id="idCardPresented" name="idCardPresented" required>

    <label for="emailAddress">Email Address:</label>
    <input type="email" id="emailAddress" name="emailAddress">

    <input type="submit" value="Submit Suspect Data">
    </body>
    </html>


    </body>
    </html>

    <?php $conn->close(); ?>
