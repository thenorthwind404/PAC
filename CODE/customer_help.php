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
            Register For Call Back
        </h1>
      <fieldset>
          <legend>
              Contact Details
          </legend>
          <form action="http://localhost/customer_help.php" method="POST">
            <table>
                <tr>
                    <td>
                        <label>
                            Mobile Number
                        </label>
                    </td>
                    <td>
                        <input type = 'text' required placeholder="" name="mno" maxlength='10'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Remark
                        </label>
                    </td>
                    <td>
                        <input type = 'text' required min= '0' placeholder="" name="remark" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>
                            Preferred time for a call back
                        </label>
                    </td>
                    <td><input type ="number" required placeholder="Enter Time in 24 hours Format" name="time">
                    </td>
                </tr>
                </table>
                <br>
                <button type="submit" name="add">
                    SUBMIT   
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
$mno=$_POST['mno'];
$remark=$_POST['remark'];
$time=$_POST['time'];
$to_email="harshithbn1808@gmail.com";
$header="From:sujaybezawada03@gmail.com";
$subject = "Customer Care";
$body=$mno.' <br/>'.$time.'<br/> '.$remark;
if(mail($to_email,$subject,$body,$header))
echo "<script>alert('Request submited. We will get back to you shortly.')</script>";
}
?>