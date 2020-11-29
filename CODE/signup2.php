<?php
$sname=$_POST['storename'];
$uname=$_POST['username'];
$pass=$_POST['pass'];
$pinc=$_POST['pinc'];


$con=mysqli_connect("localhost","root","","project");
if(mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL".mysqli_connect_errno();
 }
$q=mysqli_query($con,"SELECT * FROM stores WHERE username='$uname'");
if(mysqli_num_rows($q)>0)
{
echo("<script>alert('Username Already Exists. Choose a Different Username');document.location='StoreSignup.html'</script>");
}
else
{
mysqli_query($con,"INSERT INTO stores(name,username,password,pincode)
VALUES('$sname','$uname','$pass','$pinc')");
mysqli_close($con);

header("Location:StoreLogin.html");
}
?>