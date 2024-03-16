<?php
// Assuming you're using the same database credentials
$host = "localhost";
$user = "root";
$pwd = "";
$db = "iandb";

// Create connection
$myconn = mysqli_connect($host, $user, $pwd, $db);

// Check connection
if (!$myconn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the 'id' from the URL parameter
$id = $_GET['id'];

// Prepare the DELETE statement
$sql = "DELETE FROM irecords WHERE id = ?";

// Prepare statement
$stmt = mysqli_prepare($myconn, $sql);

// Bind parameters and execute
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

// Check if any rows were affected
if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Redirect back to your main page or display a success message
    header("Location: result2.php");
} else {
    echo "Error deleting record: " . mysqli_error($myconn);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($myconn);
?>
