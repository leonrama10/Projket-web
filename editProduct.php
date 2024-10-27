<?php
include_once 'productRepository.php';
$productRepository = new ProductRepository();

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $product = $productRepository->getProductByName($name);

    if (!$product) {
        echo "Product not found.";
        exit();
    }

    // Check if the form is submitted to update the product
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newName = $_POST['name'];
        $price = $_POST['price'];

        // Update product using the new name and price
        $productRepository->updateProductByName($name, $newName, $price);

        // Redirect back to menu page
        header("Location: menu.php");
        exit();
    }
} else {
    echo "No product specified.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="" method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br><br>

        <input type="submit" value="Save Changes">
    </form>
    <a href="menu.php">Back to Menu</a>
</body>
</html>
