<html>
    <style>
button,td,tr,th{
text-align:center;
color:white;
padding:10px;
font-size:20px;
}
        body
        {
            color:white;
            font-size: 30px;
        }
        article
        {
            color:white;
            font-family: cursive;
            font-style:bold;
            padding:20px;
            }
        button
        {
	    color:white;	
            width: 35%;
            height: 10%;
            border: 2px solid black;
            border-radius: 10px;
            background-color:rgba(209, 22, 15, 0.4);
            resize:vertical;
            font-weight: bold;
        }
        button:hover
        {
		color:black;
                background-image: linear-gradient(to right,rgb(235, 45, 45),rgb(218, 146, 51));
        }

    </style>
<body>
<script>
function buy()
{
	var d = prompt( 'Enter Pick up Date [dd/mm/yy]');
	var t = prompt('Choose a Pick up Time between 09:00 - 20:00 ');
	alert('Confirm Order?');
	document.location='cart.php?buy="buy"&time='+t+'&date='+d;
}
</script>
<?php
session_start();
if(empty($_SESSION['cart']))
echo "<center>No items avaliable in Cart.</center>";
else
{
$s=$_SESSION['storename'];
$total=0;
$con=mysqli_connect("localhost","root","","project");
$temp=array_count_values($_SESSION['cart']);
echo "<center>";
echo "<table width=90% >";
echo "<tr><th>Item</th><th>Quantity</th><th>Price</th><th></th></tr>";
foreach($temp as $key=> $value)
{
$result=mysqli_query($con, "SELECT price FROM products where storename='$s' AND itemname='$key'");
$result=mysqli_fetch_assoc($result);
$result=$result['price'];
echo "<tr><td>$key</td><td>$value</td><td>&#x20B9;$result</td><td><a href='./remove.php?id=$key'><button>Remove</button></a></td></tr>";
$total=$total+($result*$value);
}
echo "<tr><th></th><th>Total</th><th>&#x20B9; $total</th><th></th></tr>";
echo "</table>";
$b="buy";
$lk="removeall";
echo "<br>";
echo"<center><a href='http://localhost/remove.php?remove=$lk'><button>Remove All</button></a></center>";
echo"<center><button onclick=buy()>BUY</button></center>";
echo"</center>";
}
?>
<br/>
</body>
</html>
<?php
if(isset($_GET['buy']))
{
$t=$_GET['time'];
$d=$_GET['date'];
$un=$_SESSION['username'];
$sn=$_SESSION['storename'];
$temp=array_count_values($_SESSION['cart']);
$con=mysqli_connect("localhost","root","","project");
foreach($temp as $key=> $value)
{
$q1 = "SELECT * from products where storename = '$sn' and itemname = '$key'";
$res = mysqli_query($con, $q1);
$res = mysqli_fetch_assoc($res);
$r = $res['quantity'];
if($r >= $value)
{
    $r = $r-$value;
    $q2 = "UPDATE products SET quantity = $r where storename = '$sn' and itemname = '$key'";
    mysqli_query($con,$q2);
    mysqli_query($con,"INSERT INTO orders(time,date,storename,username,itemname,quantity) VALUES('$t','$d','$sn','$un','$key','$value')");
}
else
{
    echo("<script>alert('Unable to place order for $value units of $key as the store is out of stock');</script>");
}

}
unset($_SESSION['storename']);
unset($_SESSION['cart']);
mysqli_close($con);
#$sql0="SELECT email from stores WHERE name='$sn'";
#result0=mysqli_query($con,$sql0);
#$r0=mysqli_fetch_assoc($result0);
#$head = "From:harshithbn1808@gmail.com \r\n";
#$email=$r['email'];
#mail($email,"New Order","You Have a new Order Login to Check it out!!",$head)
echo("<script>alert('Order has been placed for items in Stock. Thankyou for shopping with us!!');document.location='./cart.php'</script>");
}
?>