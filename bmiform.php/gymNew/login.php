<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "dbconnect.php";


echo "<h1>Member Area</h1>";
if(!empty($_POST['username']) && !empty($_POST['password']))// check if
//username and password is empty
{
$username = $_POST['username'];
$password = md5($_POST['password']);
$checklogin = mysqli_query($myconn, "SELECT * FROM users WHERE Username ='".$username."' AND Password = '".$password."'");

if(mysqli_num_rows($checklogin) == 1) //check if username is user exists
{
$row = mysqli_fetch_array($checklogin); // retrieve the user from thetable
header('Location: checkin.html');
exit; // Ensure no further execution of the script after redirect
}
else
{
echo "<h1>Error</h1>";
echo "<p>Sorry, your username or password invalid. Please <a
href=\"index.html\">click here to try again</a>.</p>";
}
}
else
echo "Please enter the username and password to continue.";
echo "<a href=\"index.html\">click here to try again</a>.;"
?>
</body>
</html>