<html>
<style>
body{
color:white;
}
</style>
<body>
<?php
$con=mysqli_connect("localhost","root","","project");
session_start();
$m=$_GET['storename'];
$un=$_GET['username'];
$d=$_GET['date'];
if(empty($_SESSION['cart'])){
$_SESSION['cart']= array();
}
if(empty($_SESSION['storename']) || strcmp($_SESSION['storename'],$m) == 0)
{
$_SESSION['storename']=$_GET['storename'];
$sql="SELECT itemname FROM oldorders WHERE storename='$m' AND username='$un' AND date='$d'";
$result=mysqli_query($con,$sql);
while($r=mysqli_fetch_assoc($result))
	array_push($_SESSION['cart'],$r['itemname']);
echo("<script>alert('Item has been added to Cart!');document.location='http://localhost/myorders.php'</script>");
}
elseif(strcmp($_SESSION['storename'],$_GET['storename']) != 0)
{
echo("<script>alert('Please Complete the Current Order');document.location='http://localhost/myorders.php'</script>");
}

?>
</body>
</html>