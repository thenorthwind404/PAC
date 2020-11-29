<?php
session_start();
$sn=$_GET['sn'];
$un=$_GET['un'];
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
        a,button 
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
        a:hover,button:hover
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
	button
	{
		text-align:center;
		padding:10px;
		font-size:20px;
	}	
    </style>
    </head>
    <body>
        <article>
        <h2>
          Order Details
        </h2>
			
			 
		<?php
		 $sql="SELECT DISTINCT(date),time FROM orders WHERE storename='$sn' AND username='$un'";
		 $result=mysqli_query($con,$sql);
		 while($r=mysqli_fetch_assoc($result))
	 	 {
			$t=$r['time'];
			$d=$r['date'];
			echo "<div class='flex-container'>";
			echo "<div>";
			echo "<h3>Username : ".$un."<br>";
			echo "Delivery Date : ".$r['date']."<br>";
			echo "Delivery Time : ".$r['time']."<br></h3>";
			echo "<center><table width='80%'>";
			echo "<tr><th>Item Name</th><th>Quantity</th></tr>";
			$result0= mysqli_query($con,"SELECT itemname,quantity FROM orders WHERE storename='$sn' AND username='$un' AND time='$t' AND date ='$d'");
		 while($r0=mysqli_fetch_assoc($result0))
		 {	
			echo "<tr><td>".strtoupper($r0['itemname'])."</td><td>".$r0['quantity']."</td></tr>";
		 }	
			echo  "</table></center>";
			echo "<a href='deliverconfirm.php'>Deliver</a>";
		}
		?>

         		</div>
			</div>	
		
       </article>
    </body>
</html>