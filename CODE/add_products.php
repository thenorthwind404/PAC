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
        input:valid
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
            Add Products
        </h1>
      <fieldset>
          <legend>
              Table For Adding Products
          </legend>
          <form action="http://localhost/add_products.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label>
                            Product Name
                        </label>
                    </td>
                    <td>
                        <input type = 'text' required placeholder="Enter Product" name="pname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Quantity
                        </label>
                    </td>
                    <td>
                        <input type = 'number' required min= '0' placeholder="Enter Product Quantity" name="pqnty" step="any">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Price per Unit
                        </label>
                    </td>
                    <td>
                        <input type ="number" required min = '0' placeholder="Enter Product Price" name="pprice" step="any">
                    </td>
                </tr>
                </table>
                <br>
                <button type="submit" name="add">
                    ADD TO MY PRODUCT LIST   
                </button>
                <br>
          </form>
      </fieldset>
    </article>
</body>
</html>

<?php
if(isset($_POST['add']))
{
$pname=$_POST['pname'];
$pqnty=$_POST['pqnty'];
$pprice=$_POST['pprice'];
$con=mysqli_connect("localhost","root","","project");
if(mysqli_connect_errno())
 {
  echo "Failed to connect to MySQL".mysqli_connect_errno();
 }
mysqli_query($con,"INSERT INTO products(storename,username,itemname,quantity,price)
VALUES('$sn','$un','$pname',$pqnty,$pprice)");
echo "<script>alert('Successfully Added!')</script>";
mysqli_close($con);
}
?>