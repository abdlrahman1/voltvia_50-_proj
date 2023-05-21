<!-- HTML markup omitted for brevity -->
<?php

include("show_products_oop.php");
$productManager = new ProductManager($database);

// If the form has been submitted, update the product information
if (isset($_POST['update_product'])) {
  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_quantity = $_POST['product_quantity'];
  $product_purchase_price = $_POST['product_Purchase_price'];
  $product_selling_price = $_POST['Product_selling_price'];
  $product_code = $_POST['product_code'];
  $reviews = $_POST['reviews'];

  $productManager->updateProduct($product_id, $product_name, $product_quantity, $product_purchase_price, $product_selling_price, $product_code, $reviews);
}

if (isset($_POST["del"])) {
  $product_id = $_POST["product_id"];
  $productManager->deleteProduct($product_id);
}

// Retrieve the list of products from the database
$products = $productManager->getProducts();

?>


<table>
  <thead>
    <tr>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Purchase Price</th>
      <th>Selling Price</th>
      <th>Product Code</th>
      <th>Reviews</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($products as $product): ?>
      <tr>
        <form method="POST" class="edit-form">
          <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
          <td><input type="text" name="product_name" value="<?php echo $product['product_name']?>"></td>
          <td><input type="text" name="product_quantity" value="<?php echo $product['product_quantity']?>"></td>
          <td><input type="text" name="product_Purchase_price" value="<?php echo $product['product_Purchase_price']?>"></td>
          <td><input type="text" name="Product_selling_price" value="<?php echo $product['Product_selling_price']?>"></td>
          <td><input type="text" name="product_code" value="<?php echo $product['product_code']?>"></td>
          <td><input type="text" name="reviews" value="<?php echo $product['reviews']?>"></td>
          <td>
            <button class="edit-submit" type="submit" name="update_product">Update</button>
            <button type="submit" name="del">Delete</button>
            <a href="product_details.php?id=<?php echo $product['id']; ?>">Details</a>

          </td>
        </form>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php

