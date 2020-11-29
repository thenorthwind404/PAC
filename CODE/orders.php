<?php
session_start();
$sn=$_SESSION['storename'];
$con=mysqli_connect("localhost","root","","project");
?>
<html>
    <head>
    <style>
        *
        {
            color: white;
        }
        body
        {
            color:white;
        }
        article
        {
            color:white;
            font-style:bold;
            padding:20px;
        }
        h1
        {
            color: white;
        }
        .flex-container 
        {
          display: flex;
          flex-direction: column;
        }

        .flex-container > div 
        {
          width: 80%;
          margin-left:3%;
          font-size: 30px;
          border: 4px solid white;
          padding-left:2%;
          padding-right:4%;
          margin-top:3%;
          color:white;
          border-radius: 5px;
        }
        h3 
        {
            font-size: 70%;
        }
        h4 
        {
            padding-left: 5%;
            font-size: 70%;
        }
        h2
        {
            padding-left: 5%;
        }
        a 
        {
            text-decoration:none;
            color: white;
            padding-left: 5%;
            padding-right: 5%;
            padding-top: 1%;
            padding-bottom: 1%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            transition-duration: 0.4s ease;
            cursor: pointer;
            border-radius: 15px;
            font-weight: bold;
            margin-top: 2%;
            float: right;
            background-color: rgba(1,1,1,0.5);
            margin-bottom:2%;
            background-color: white;
            color: black;
            border: 2px solid black;
        }
        a:hover
        {
            background-image: linear-gradient(to right,rgba(233, 46, 13, 0.9),rgba(221, 93, 8, 0.9));
                color: black;
                background-color: white;
        }
    </style>
    </head>
    <body>
        <article>
        <h2>
          Current Orders
        </h2>
		<?php
		 $sql="SELECT DISTINCT(username) FROM `orders` WHERE storename='$sn'";
		 $result=mysqli_query($con,$sql);
		 while($r=mysqli_fetch_assoc($result))
		 {
			$un=$r['username'];
			echo " <div class='flex-container'>";
			echo '<div> <h3>';
			echo "<a href ='http://localhost/deliver.php?un=$un&sn=$sn' target='iframe_b'>";
			echo "Order Details";
        		echo "</a>";
        		echo strtoupper($un)."</h3>";
        		echo "</div>";
			echo "</div>";	
			#echo "Username : ".$un."<br>";
			#$sql1="SELECT * FROM orders WHERE storename='$sn' AND username='$un'";
			#$result2=mysqli_query($con,$sql1);
			#echo "Products<br>";
			#while($r2=mysqli_fetch_assoc($result2))
			#	echo $r2['itemname']." ".$r2['quantity']."<br>";
		 }
		?>
       </article>
    </body>
</html>