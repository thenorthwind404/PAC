<?php
session_start();
$con=mysqli_connect("localhost","root","","project");
$result1=mysqli_query($con, "SELECT name FROM stores ORDER BY name");
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
          Stores
        </h2>
	 <?php
	 while($sname=mysqli_fetch_assoc($result1))
	 {	
	echo " <div class='flex-container'>";
        $n = $sname['name'];
        echo '<div> <h3>';
        echo "<a href ='http://localhost/link1.php?id=$n' target='iframe_b'>";
        echo "Search Products";
        echo "</a>";
        echo strtoupper($sname['name'])."</h3>";
        echo "</div>";
	echo "</div>";

	 }
       ?>
       </article>
    </body>
</html>