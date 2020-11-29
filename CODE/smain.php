<html>
    <head>
        <title>
            Default page
        </title>
    </head>
    <style>
        body
        {
            background-image:linear-gradient(to right,rgb(235, 45, 45,0.7),rgb(218, 146, 51,0.7))
        }
        article
        {
            color:white;
            font-family: cursive;
            font-style:bold;
            width:45%;
            padding-top:20px;
            padding-bottom:20px;
            padding-left: 20px;
        }
        th
        {
            border:2px solid white;
        }
        a
        {
            text-decoration:none;
            color:white;
        }
        a:hover
        {
            color:black;
        }
    </style>
    <body>
<script>
function closeWin() {
  myWindow.close();   // Closes the new window
}
</script>
        <article>
       <h2>
           <a href = "products_store.php" target='iframe_b'>
               Products
           </a>
       </h2>
       <h2>
           <a href = "add_products.php" target='iframe_b'>
               Add Product
           </a>
       </h2>
       <h2>
           <a href = "update_product.php" target='iframe_b'>
               Update Product
           </a>
       </h2>
       <h2>
           <a href = 'orders.php' target = 'iframe_b'>
               Orders
           </a>
       </h2>
       <h2>
           <a href = 'customer_help.php' target = 'iframe_b'>
               Help
           </a>
       </h2>
       <h2>
           <a href = './logout.php' target = '_blank' onclick= "closeWin()" >
               Logout
           </a>
       </h2>
       </article>
    </body>
</html>