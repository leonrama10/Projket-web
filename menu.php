<?php
session_start();

if (!isset($_SESSION['user_role'])) {
    header('Location: LOGINFORM.php');
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'ProductRepository.php';
$productRepository = new ProductRepository();
$products = $productRepository->getProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="site-logo">
                <h1 class="s-l-h1-1">L&D MEAT</h1>
            </div>
            <nav class="site-nav">
                <ul class="site-nav_menu">
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <li><a href="Administrator.php">ADMIN</a></li>
                    <?php endif; ?>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="menu.php">MENUS</a></li>
                    <li><a href="About-us.php">ABOUT US</a></li>
                    <li><a href="reserving.php">RESERVING</a></li>
                    <li><a href="LogOut.php">LOGOUT</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="content">
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <div class="add-product-container">
                <h1>Add Product</h1>
                <form action="addProductController.php" method="POST" enctype="multipart/form-data" class="add-product-form">
                    <input type="text" name="name" placeholder="Product Name" required><br>
                    <input type="text" name="price" placeholder="Price" required><br>
                    <input type="file" name="image" required><br>
                    <input type="submit" name="addProduct" value="Add Product">
                </form>
            </div>
        <?php endif; ?>

        <h1 class="menu-title">Our Menu</h1>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Product Image" class="product-image">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p class="price">Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <div class="product-actions">
                            <a href="editProduct.php?name=<?php echo urlencode($product['name']); ?>">Edit</a> |
                            <a href="deleteProduct.php?name=<?php echo urlencode($product['name']); ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="footer">
        <div class="footer-links">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a class="fd-1" href="https://www.ubt-uni.net/sq/ballina/">Home</a>
            <a href="#"><i class="far fa-envelope"></i></a>
            <a class="fd-1" href="https://www.google.com/search?q=gmail">About</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i></a>
            <a class="fd-1" href="https://www.ubt-uni.net/sq/ubt/kontakti/">Contact</a>
        </div>
    </div>
</body>
</html>
