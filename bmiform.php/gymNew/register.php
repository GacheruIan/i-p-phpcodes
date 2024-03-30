<?php
require_once('dbconnect.php');

$fullnames = $_POST['fullname'];
$username = $_POST['username'];
// Using md5 for demonstration as per your request, but it's not recommended
$password = md5($_POST['password']); 
$email = $_POST['email'];

// Check if username already exists
$checkusername = mysqli_query($myconn, "SELECT * FROM users WHERE Username = '".$username."'");
// If username exists, generate error message
if (mysqli_num_rows($checkusername) > 0) {
    echo "<h1>Error</h1>";
    echo "<p>Sorry, that username already exists. Please go back and choose another user name.</p>";
} else {
    // Insert user details into the table users
    // Corrected the mysqli_query by adding the connection variable
    $registerquery = mysqli_query($myconn, "INSERT INTO users (FullName, Username, Password, EmailAddress) VALUES ('$fullnames','$username','$password','$email')");
    if ($registerquery) {
        // Confirm the user details were inserted into table
        echo "<h1>Success</h1>";
        echo "<p>Your user account was successfully created. Please <a href=\"index.html\">click here to login</a>.</p>";
    } else {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
    }
}
?>
