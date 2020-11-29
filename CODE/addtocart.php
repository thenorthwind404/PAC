<html>
<style>
body{
color:white;
}
</style>
<body>
<?php
session_start();
$m=$_GET['storename'];
if(empty($_SESSION['cart'])){
$_SESSION['cart']= array();
}
if(empty($_SESSION['storename'])){
$_SESSION['storename']=$_GET['storename'];
array_push($_SESSION['cart'],$_GET['itemname']);
}
elseif(strcmp($_SESSION['storename'],$_GET['storename']) != 0){
echo("<script>alert('Please Complete the Current Order');document.location='main.php'</script>");
}
else { 
array_push($_SESSION['cart'],$_GET['itemname']);
}
echo("<script>alert('Item has been added to Cart!');document.location='link1.php?id=$m'</script>");
?>
</body>
</html>