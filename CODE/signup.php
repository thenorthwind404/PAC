<?php
$uname=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$pin=$_POST['pin'];
$mno=$_POST['mno'];
$pinc=$_POST['pinc'];


$con=mysqli_connect("localhost","root","","project");
if(mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL".mysqli_connect_errno();
 }
$q=mysqli_query($con,"SELECT * FROM customer WHERE username='$uname'");
if(mysqli_num_rows($q)>0)
{
echo("<script>alert('Username Already Exists. Choose a Different Username');document.location='CustomerSignup.html'</script>");
}
else
{
mysqli_query($con,"INSERT INTO customer(username,email,password,pin,mobile_number,pincode)
VALUES('$uname','$email','$pass','$pin','$mno','$pinc')");
mysqli_close($con);

header("Location:CustomerLogin.html");
}
?>