<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>
        Top bar
    </title>
    <style>
	*
        {
            font-family:cursive;
            color:white;
        }
        h2
        {
            float:right;
            padding-right: 3%;
            font-size:120%;
        }
        a
        {
            font-size: 200%;
            text-decoration: none;
            float:right;
            padding-right: 2.5%;
        }
        img
        {
            font-size: 200%;
            text-decoration: none;
            float:right;
            padding-right: 2.5%;
        }
    </style>
</head>
<body>
    <?php
     echo "<h1>Product Availablity Checker - Welcome ".$_SESSION['username']." !<a href='cart.php' target='iframe_b'><img src = 'cart_image.png'></img></a></h1>";
    ?>
</body>
</html>
