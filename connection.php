<?php
$con=mysqli_connect("localhost","root","","jobportal_gmit");
if(!$con)
{
   echo "<script>alert('Error in database connection');</script>";
}
else
{
	echo "connection";
}
?>