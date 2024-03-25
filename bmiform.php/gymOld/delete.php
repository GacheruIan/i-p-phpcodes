<?php
require_once("result2.php");

$id=$_REQUEST['id'];

$del=mysqli_query($myconn, "DELETE FROM irecords WHERE id='$id'");
if($del)
{
echo"Record Successfully Deleted!!";
}
else
{
echo"Record Not Deleted!!";

}
echo "<a href='result2.php'> Go back to records list</a>";
?>

