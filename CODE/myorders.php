<?php
session_start();
$un=$_SESSION['username'];
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
	td,tr,th
	{
		text-align:center;
		color:white;
		padding:10px;
		font-size:20px;
	}
    </style>
    </head>
    <body>
        <article>
        <h2>
          Past Orders
        </h2>
		<?php
		 $sql="SELECT DISTINCT(storename) FROM `oldorders` WHERE username='$un'";
		 $result=mysqli_query($con,$sql);
		 while($r=mysqli_fetch_assoc($result))
		 {	 
			$sn=$r['storename'];
			$result10=mysqli_query($con,"SELECT DISTINCT(date) from oldorders WHERE username='$un' AND storename='$sn'");
			while($r10=mysqli_fetch_assoc($result10))
			{$d=$r10['date'];
			echo " <div class='flex-container'>";
			echo '<div>';
        		echo "<h3>Date : ".$d."</h3>";
        		echo "<h3>Store Name : ".strtoupper($sn)."</h3>";
			echo "<center><table width='80%'>";
			echo "<tr><th>Item Name</th><th>Quantity</th></tr>";
			$sql2="SELECT itemname,quantity FROM oldorders WHERE storename='$sn' AND username='$un' AND date='$d'";
			$result2=mysqli_query($con,$sql2);
			while($r2=mysqli_fetch_assoc($result2))
			{
			 echo "<tr><td>".$r2['itemname']."</td><td>".$r2['quantity']."</td></tr>";
			}
			echo  "</table></center>";
			echo "<a href ='http://localhost/oldaddtocart.php?storename=$sn&username=$un&date=$d' target='iframe_b'>";
			echo "Add Order To Cart";
        		echo "</a>";
        		echo "</div>";
			echo "</div>";}	

		 }
		?>
       </article>
    </body>
</html>