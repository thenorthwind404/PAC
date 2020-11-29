<?php
session_start();
$con=mysqli_connect("localhost","root","","project");
$un=$_POST['username'];
$pw=$_POST['pass'];
$q="SELECT * FROM stores WHERE username='$un' AND password='$pw'";
$result=mysqli_query($con, $q);
$row = mysqli_fetch_array($result);
if(isset($row))
{
$r=mysqli_query($con,"SELECT name FROM stores WHERE username='$un' AND password ='$pw'");
$r=mysqli_fetch_assoc($r);
$_SESSION['storename']=$r['name'];
$_SESSION['username']=$un;
header("Location:store.php");
}
else
{
echo "<script type='text/javascript'>alert('Wrong password and Username');</script>";
}
?>
