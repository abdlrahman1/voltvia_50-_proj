<?php
session_start();
include("connection.php");

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];

  // Prepare and execute the SQL query to fetch the product sales based on the ID
  $query = $database->prepare("SELECT * FROM product_sale WHERE product_id = :product_id");
  $query->bindParam(':product_id', $product_id, PDO::PARAM_INT);
  $query->execute();

  // Fetch all product sales as an associative array
  $product_sales = $query->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($_POST['search'])) {
  $search = $_POST['search'];

  // Prepare and execute the SQL query to search for product sales by product ID, customer name, or date
  $query = $database->prepare("SELECT * FROM product_sale WHERE product_id LIKE :search OR cust_name LIKE :search ");
  $query->bindValue(':search', '%' . $search . '%');
  $query->execute();
  
  // Fetch all product sales as an associative array
  $product_sales = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Sales</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
    }

    .search-form {
      margin-bottom: 20px;
    }

    .search-form input[type="text"] {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      line-height: 1.5;
      border: 1px solid #ccc;
      border-radius: 4px;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .search-form button {
      margin-top: 10px;
      padding: 8px 16px;
      font-size: 16px;
      line-height: 1.5;
      border: none;
      border-radius: 4px;
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }

    .product-sales {
      margin-bottom: 20px;
    }

    .product-sales h2 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .product-sales table {
      width: 100%;
      border-collapse: collapse;
    }

    .product-sales table th,
    .product-sales table td {
      padding: 8px;
      border: 1px solid #ccc;
    }

    .product-sales table th {
      background-color: #f2f2f2;
    }

    .product-sales table tr:nth-child(even) {
      background-color: #f9f9f9;
    }
</style>
  </head>
<body>
  <div class="container">
    <div class="search-form">
    <form method="post">
        <input type="text" name="search" placeholder="Search by product ID, customer name, or date">
        <button type="submit">Search</button>
      </form>
    </div>

    <div class="product-sales">
      <h2>Product Sales</h2>
      <?php if (!empty($product_sales)): ?>
        <table>
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Quantity Sold</th>
              <th>Customer Name</th>
              <!-- Add additional columns here -->
            </tr>
          </thead>
          <tbody>
            <?php foreach ($product_sales as $product_sale): ?>
              <tr>
                <td><?php echo $product_sale['product_id']; ?></td>
                <td><?php echo $product_sale['product_name']; ?></td>
                <td><?php echo $product_sale['quantity_sold']; ?></td>
                <td><?php echo $product_sale['cust_name']; ?></td>
                <!-- Add additional columns here -->
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p>No product sales found.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>

