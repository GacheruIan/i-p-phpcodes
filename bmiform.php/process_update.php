<html>
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
          
        }

        h2, h3 {
            color: black;
            
        }

        a {
            display: inline-block;
            background-color: gray;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            color: white;
        }

        a:hover {
            background-color: #0056b3;
        }

        .details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
    </style>
</head>
        
<body>
<h2> Update Client Details </h2>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('dbconnect.php');

// Receive data from form and assign to variables
$id = $_POST['id'];
$name = $_POST['name']; // Assuming 'name' is a readonly field and not meant to be updated
// $ageRange = $_POST['age_range'];
// $gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$sessions = $_POST['sessions'];
$pushIntensity = $_POST['push_intensity'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Construct the UPDATE SQL query
$update = "UPDATE Clients SET name='$name', height='$height', weight='$weight', sessions='$sessions', push_intensity='$pushIntensity', email='$email', phone='$phone' WHERE id='$id'";

if (!mysqli_query($myconn, $update)) {
    echo "Record not updated. Try Again";
} else {
    echo "Record updated successfully!";
}

// Optionally, you might want to print the updated details:
echo "<h3>Updated Client Details:</h3>";
echo "Name: " . $name . "<br>";
// echo "Age Range: " . $ageRange . "<br>";
// echo "Gender: " . $gender . "<br>";
echo "Height: " . $height . "<br>";
echo "Weight: " . $weight . "<br>";
echo "Sessions: " . $sessions . "<br>";
echo "Push Intensity: " . $pushIntensity . "<br>";
echo "Email: " . $email . "<br>";
echo "Phone Number: " . $phone . "<br>";
echo "<br><a href='insert.php'> Go back to records</a>";


?>
</body>
</html>