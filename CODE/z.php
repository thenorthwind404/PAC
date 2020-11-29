<?php
if(isset($_GET['buy']))
{
$t=$_GET['time'];
$d=$_GET['date'];
echo("<script>alert('Hi');</script>");
echo("<script>alert('$t');</script>");
echo("<script>alert('$d');</script>");
}
?>
<html>
<script>
buy();
function buy()
{
	var d = Promt( 'Enter Pick up Date [dd/mm/yy]');
	var t = prompt('Choose a Pick up Time between 09:00 - 20:00 ');
	alert('Confirm Order?');document.location='z.php?buy="buy"&time=t&date=d';
}
</script>
<body>
<button onclick=buy() >BUY</button>
</body>
</html>