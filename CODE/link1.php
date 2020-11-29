<html>
    <head>
	<meta http-equiv="refresh" content="10">
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
	 <?php
            echo "<h2> Products in ";
            $sname=$_GET['id'];
            echo strtoupper($sname)."<h2>";
            $con=mysqli_connect("localhost","root","","project");
            $result=mysqli_query($con, "SELECT * FROM products where storename='$sname' ORDER BY itemname");
            echo "<div class='flex-container'>";
            while($iname=mysqli_fetch_assoc($result))
            {
                if($iname['quantity']>0)
                {
                    $i=$iname['itemname'];
                    $j =$iname['price'];
                    echo "<div>";
                    #echo "Rs.$j";
                    echo "<a href ='./addtocart.php?itemname=$i&storename=$sname'>";
                    echo "Add to cart";
                    echo "</a>";
                    echo "<h4>".strtoupper($i);
                    echo "<br/><br/> Price :  Rs.$j"."</h4>";
                    echo "</div>";
                }
            } 
            echo "</div>";
       ?>
       </article>
    </body>
</html>