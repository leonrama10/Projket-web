<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: menu.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styleProducts.css">
</head>
<body>

<div class="container-box">
    <h1>Add Product</h1>
    <form action="addProductController.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" placeholder="Product Name" required minlength="3"><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" placeholder="Price" required><br><br>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" required><br><br>

        <input type="submit" name="addProduct" value="Add Product">
    </form>
    <a href="menu.php">Back to Menu</a>
</div>

</body>
</html>
