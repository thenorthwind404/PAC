<html>
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
            Deliver Products
        </h1>
      <fieldset>
          <legend>
              Table For Adding Products
          </legend>
          <form action="http://localhost/deliverconfirm.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label>
                            Store Name
                        </label>
                    </td>
                    <td>
                        <input type = 'text' id='sname' required placeholder="Enter Store Name" name="sname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Username                        
			</label>
                    </td>
                    <td>
                        <input type = 'text' required  id='uname' placeholder="Enter Customer Username" name="uname">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Date                        
			</label>
                    </td>
                    <td>
                        <input type = 'text' required  id='uname' placeholder="dd/mm/yy" name="date">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            PIN
                        </label>
                    </td>
                    <td>
                        <input type ="text" required minlength = '4' placeholder="Ask Customer 4-Digit PIN" name="pin" >
                    </td>
                </tr>
                </table>
                <br>
                <button type="submit" name="deliver">
                    Confirm Delivery   
                </button>
                <br>
          </form>
      </fieldset>
    </article>
</body>
</html>

<?php
if(isset($_POST['deliver']))
{
$sn=$_POST['sname'];
$un=$_POST['uname'];
$pin=$_POST['pin'];
$date=$_POST['date'];
$con=mysqli_connect("localhost","root","","project");
$sql="SELECT pin from CUSTOMER where username='$un'";
$result=mysqli_query($con,$sql);
$re = mysqli_fetch_assoc($result);
$pincheck=$re['pin'];
if($pin==$pincheck)
{
	$sql1= "SELECT * FROM orders WHERE storename='$sn' AND username='$un' AND date='$date'";
	$result1=mysqli_query($con,$sql1);
	while($re1=mysqli_fetch_assoc($result1))
	{
		$it=$re1['itemname'];
		$qt=$re1['quantity'];
		$sql2 = "DELETE FROM orders WHERE storename='$sn' AND username='$un' AND itemname='$it' AND quantity='$qt' AND date='$date'";
		$sql3 = "INSERT INTO `oldorders`(`date`,`storename`, `username`, `itemname`, `quantity`) VALUES ('$date','$sn','$un','$it',$qt)";
		mysqli_query($con,$sql2);
		mysqli_query($con,$sql3);
	}	
	echo "<script>alert('Delivery Successful');</script>";
}
else
{
	echo "<script>alert('Wrong PIN. Please Re-Enter')</script>";
}

}
?>