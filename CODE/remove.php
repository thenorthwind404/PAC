<html>
<style>
body{color:white;}
</style>
<body>
<?php
session_start();
if(isset($_GET['id']))
{
$id=$_GET['id'];
unset($_SESSION['cart'][array_search($id,$_SESSION['cart'])]);

if(empty($_SESSION['cart']))
unset($_SESSION['storename']);

echo("<script>alert('Item has been removed from Cart');document.location='cart.php'</script>");
}
if(isset($_GET['remove']))
{
unset($_SESSION['storename']);
unset($_SESSION['cart']);
echo("<script>alert('All Items have been removed from Cart');document.location='cart.php'</script>");
}
?>
</body>
</html>