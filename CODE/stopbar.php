<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>
        Top bar
    </title>
    <style>
        h1,h2
        {
            font-family:cursive;
            color:white;
        }
    </style>
</head>
<body>
    <?php
     echo "<h1>Product Availablity Checker - Welcome ".$_SESSION['username']." !</h1>";
    ?>
</body>
</html>
