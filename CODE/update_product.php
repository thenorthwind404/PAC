<?php
session_start();
$sn=$_SESSION['storename'];
$un=$_SESSION['username'];
?>
<!DOCTYPE html>
<head>
    <style>
        *
        {
            font-family: cursive;
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
        input
        {
                width: 300px;
                height: 30px;
                border: 2px solid black;
                border-radius: 10px;
                background-color:rgba(209, 22, 15, 0.4);
                resize:vertical;
                color: white;
                font-family: Georgia, 'Times New Roman', Times, serif;
        }
        input:focus
        {
                background-image: linear-gradient(to right,rgb(235, 45, 45,0.8),rgb(218, 146, 51,0.8));
        }
        input[type = 'text']:valid
        {
                background-image: linear-gradient(to right,rgb(235, 45, 45,0.8),rgb(218, 146, 51,0.8));
        }
        input[type = 'number']:visited
        {
            background-image: linear-gradient(to right,rgb(235, 45, 45,0.8),rgb(218, 146, 51,0.8));
        }
        button
        {
            width: 525px;
            height: 40px;
            border: 2px solid black;
            border-radius: 10px;
            background-color:rgba(209, 22, 15, 0.4);
            resize:vertical;
            font-weight: bold;
        }
        button:hover
        {
                background-image: linear-gradient(to right,rgb(235, 45, 45),rgb(218, 146, 51));
        }
        label
        {
            padding-right: 100px;
            font-size: large;
        }
        legend
        {
            font-size: large;
        }
        input::placeholder
        {
            font-family: cursive;
            color: blanchedalmond;
        }
    </style>
</head>
<body>
    <article>
        <h1>
            Update Price or Quantity
        </h1>
      <fieldset>
          <legend>
              Table For Updating Product Details
          </legend>
          <form action="http://localhost/update_product.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label>
                            Product Name
                        </label>
                    </td>
                    <td>
                        <input type = 'text' required placeholder="Enter name of product to be updated" name="pname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Quantity
                        </label>
                    </td>
                    <td>
                        <input type = 'number' placeholder="Enter Updated Quantity" step="any" name="pqnty">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Price per Unit
                        </label>
                    </td>
                    <td>
                        <input type ="number" placeholder="Enter Updated Price" step="any" name="pprice">
                    </td>
                </tr>
                </table>
                <br>
                <button type="submit" name="update">
                    UPDATE PRODUCT DETAILS
                </button>
                <br>
          </form>
      </fieldset>
    </article>
</body>
</html>
<?php
if(isset($_POST['update']))
{
$pname=$_POST['pname'];
$pqnty=$_POST['pqnty'];
$pprice=$_POST['pprice'];
$con=mysqli_connect("localhost","root","","project");
if(mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL".mysqli_connect_errno();
 }
$r=mysqli_query($con , "SELECT * FROM products WHERE itemname='$pname' AND storename='$sn' AND username='$un' ");
if(mysqli_num_rows($r)>=1)
{
mysqli_query($con,"UPDATE products SET quantity=$pqnty, price=$pprice WHERE itemname='$pname' AND storename='$sn' AND username='$un'");
echo "<script>alert('Successfully Updated!')</script>";
}
else
{
echo "<script>alert('Please check product name!')</script>";
}
mysqli_close($con);
}
?>