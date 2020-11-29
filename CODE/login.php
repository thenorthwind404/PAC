<?php
session_start();
$con=mysqli_connect("localhost","root","","project");
$un=$_POST['username'];
$pw=$_POST['pass'];
$q="SELECT * FROM customer WHERE username='$un' AND password='$pw'";
$result=mysqli_query($con, $q);
$row = mysqli_fetch_array($result);
if(isset($row))
{
$_SESSION['username']=$un;
header("Location:customer.php");
}
else
{
echo "<script type='text/javascript'>alert('Wrong password and Username');</script>";
header("Location:CustomerLogin.html");
}
?>
