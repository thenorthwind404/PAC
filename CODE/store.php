<html>
    <head>
<link rel = 'icon' type = 'image/png' href = 'purse.png'>
        <title>
            PAC
        </title>
        <style>
            body
            {
                background-color:black;
            }
            #frame1
            {
                border-top-right-radius: 50px;
                border-bottom-right-radius: 50px;
                animation: move 20s;
            }
            #frame1:hover
            {
                background-image:linear-gradient(to right,rgb(235, 45, 45),rgb(218, 146, 51))
            }
        </style>
    </head>
    <body background="proj_bg.jpg">
        <iframe src="http://localhost/stopbar.php" width = 100% height= 90px scrolling="no" style="border:none"></iframe>
        <iframe src="http://localhost/smain.php" name="iframe_a" width=20% height = 85% title="Iframe Example" style="border:none" id = "frame1" style="box-shadow:grey;"></iframe>
        <iframe src="http://localhost/ssecond.php" name='iframe_b'width= 77% height= 85% style="border:none;" ></iframe>
    
    </body>
</html>