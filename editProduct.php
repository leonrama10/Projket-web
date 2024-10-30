<?php
include_once 'productRepository.php';
$productRepository = new ProductRepository();

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $product = $productRepository->getProductByName($name);

  
    if (!$product) {
        echo "<p style='color: red; text-align: center;'>Product not found.</p>";
        exit();
    }


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $newName = $_POST['name'];
        $price = $_POST['price'];

      
        $productRepository->updateProductByName($name, $newName, $price);

        
        header("Location: menu.php");
        exit();
    }
} else {
    echo "<p style='color: red; text-align: center;'>No product specified.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="editProduct.css"> 
</head>
<body>
    <header>
        <div class="site-logo">
            <h1 class="s-l-h1-1">L&D MEAT</h1>
        </div>
        <nav class="site-nav">
            <ul class="site-nav_menu">
                <li><a href="Administrator.php">Admin</a></li>
                <li><a href="index.php">HOME</a></li>
                <li><a href="menu.php">MENUS</a></li>
                <li><a href="About-us.php">ABOUT US</a></li>
                <li><a href="reserving.php">RESERVING</a></li>
                <li><a href="LogOut.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>

    <div class="form-container">
        <h1>Edit Product</h1>
        <form action="" method="POST">
            <label for="name">Product Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br>

            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required><br>

            <input type="submit" value="Save Changes">
        </form>
        <a href="menu.php">Back to Menu</a>
    </div>

    <div class="footer">
        <div class="footer-links">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="https://www.ubt-uni.net/sq/ballina/">Home</a>
            <a href="https://www.google.com/search?q=gmail">About</a>
            <a href="https://www.ubt-uni.net/sq/ubt/kontakti/">Contact</a>
        </div>
    </div>
</body>
</html>
