<?php
session_start();
$con=mysqli_connect("localhost","root","","project");
$n= $_SESSION['username'];
$result1=mysqli_query($con, "SELECT itemname FROM products WHERE username = '$n' ORDER BY itemname");
$result2=mysqli_query($con, "SELECT * FROM products WHERE username = '$n' ORDER BY itemname");
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
            font-family: cursive;
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
    </style>
    </head>
    <body>
        <article>
        <h2>
          Products in your store
        </h2>
     <?php
     echo"<datalist id='items'>";
     while($sname=mysqli_fetch_assoc($result1))
     {  
      echo "<option>".$sname['itemname']."</option>";
     }
    echo "</datalist>"; 
    echo '<div class="flex-container">';
    while($sname=mysqli_fetch_assoc($result2))
    {   
      echo '<div> <h3>';
      echo strtoupper($sname['itemname']) . '</h3> <h4> Price    :   ';
      echo  $sname['price'].'<h4><h4> Quantity  :  '.$sname['quantity'].'</h4><br/>';
      echo '</div>';
    }
    echo '</div>';
       ?>
       </article>
    </body>
</html>