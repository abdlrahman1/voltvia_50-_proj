<?php
session_start();
include("connection.php");
include("add_product_oop.php");
include("header.php");

if (isset($_POST["btn"])) {
    $product = new Product($database);

    $pro_name = $_POST["product_name"];
    $pro_quantity = $_POST["product_quantity"];
    $pro_purchase = $_POST["product_Purchase_price"];
    $pro_selling = $_POST["Product_selling_price"];
    $pro_code = $_POST["product_code"];
    $reviews = $_POST["reviews"];

    $product->setProductDetails($pro_name, $pro_quantity, $pro_purchase, $pro_selling, $pro_code, $reviews);
    $product->addProduct();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>

.con{
    width:50%;
    margin:100px auto 100px auto;
    display:flex;
    background-color:#eee;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:10px;
}
.con input{
    width:300px;
    height:40px;
    margin:10px;
    border-radius:8px;
    border:none;
}
.con button{

    width:150px;
    height:40px;
    background-color:orange;
    border:none;
    color:white;
    border-radius:8px;
    padding:5px;
    margin:10px;
    font-size:22px;

}
.con textarea{
    width:300px;
    height:100px;
}

</style>
</head>
<body>

    <form method="post" class="con">
        <input type="text" name="product_name" placeholder="اسم المنتج">
        <input type="text" name="product_quantity" placeholder="كمية المنتج">
        <input type="text" name="product_Purchase_price" placeholder="سعر الشراء">
        <input type="text" name="Product_selling_price" placeholder="سعر البيع">
        <input type="text" name="product_code" placeholder="كود منتج ">
<textarea type="text" name="reviews" placeholder="ملاحظات"> </textarea>
<button type="submit" name="btn">ارسال</button>
</form>

</body>
</html>
