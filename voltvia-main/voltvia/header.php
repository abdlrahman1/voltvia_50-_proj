<?php
include("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
    header{
        width:50%;
        height:100px;
        background-color:black;
        display:flex;
        flex-direction:row;
        margin:100px auto 100px auto; 
        justify-content:center;
    }
 
    header a {
        text-decoration:none;
        color:white;
        margin:4px;
    }
        </style>
</head>
<body>
<header>
 <div class="icon"> <a href="add_product.php"> add_product </a> </div>
 <div class="icon"> <a href="add_product.php"> add_product </a> </div>
 <div class="icon"> <a href="add_product.php"> add_product </a> </div>
</header>
</body>
</html>