<?php

class Product
{
    private $pro_name;
    private $pro_quantity;
    private $pro_purchase;
    private $pro_selling;
    private $pro_code;
    private $reviews;
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function setProductDetails($pro_name, $pro_quantity, $pro_purchase, $pro_selling, $pro_code, $reviews)
    {
        $this->pro_name = $pro_name;
        $this->pro_quantity = $pro_quantity;
        $this->pro_purchase = $pro_purchase;
        $this->pro_selling = $pro_selling;
        $this->pro_code = $pro_code;
        $this->reviews = $reviews;
    }

    public function addProduct()
    {
        if (isset($this->pro_name) && isset($this->pro_quantity) && isset($this->pro_purchase) && isset($this->pro_selling) && isset($this->pro_code) && isset($this->reviews)) {
            $insert = $this->database->prepare("INSERT INTO products(product_name, product_quantity, product_Purchase_price, Product_selling_price, product_code, reviews)
                VALUES(:pro_name, :pro_quantity, :pro_purchase, :pro_selling, :pro_code, :reviews)");
            $insert->bindParam(":pro_name", $this->pro_name);
            $insert->bindParam(":pro_quantity", $this->pro_quantity);
            $insert->bindParam(":pro_purchase", $this->pro_purchase);
            $insert->bindParam(":pro_selling", $this->pro_selling);
            $insert->bindParam(":pro_code", $this->pro_code);
            $insert->bindParam(":reviews", $this->reviews);
            if ($insert->execute()) {
                echo "The product was added";
                header("Location: add_product.php");
            } else {
                echo "There was an error while adding the product";
            }
        } else {
            echo "Please fill in the product inputs";
        }
    }
}

?>