<?php
require_once('dbconnect.php'); // call connect code

$result=mysqli_query($myconn,"SELECT * FROM orders");

$row = mysqli_fetch_array($result);

echo $row['id'];
echo $row['customer'];
echo $row['product'];
echo $row['price'];
echo $row['quantity'];
echo $row['total'];
?>

