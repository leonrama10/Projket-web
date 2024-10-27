<?php
session_start();

if (!isset($_SESSION['user_role'])) {
    header('Location: LOGINFORM.php');
    exit();
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
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
                    <li><a href="https://www.google.com/maps/dir//UBT+College,+10000+Bulevardi+Bill+Klinton,+Prishtina/@42.6532375,21.0700476,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x13549f47a5602081:0xec721f5ff5e05ca0!2m2!1d21.1462653!2d42.6532375?entry=ttu&g_ep=EgoyMDI0MTAyMy4wIKXMDSoASAFQAw%3D%3D">LOCATIONS</a></li>
                    <li><a class="border-a-1" href="reserving.php">RESERVING</a></li>
                    <li><a href="LogOut.php">LOGOUT</a></li>  
                </ul>
            </nav>
        </div>
    </header>

    <div class="menu-container">
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <h1>Manage Products</h1>
        <?php endif; ?>

        <?php
        include_once 'productRepository.php';
        $productRepository = new ProductRepository();
        $products = $productRepository->getProducts();

     
        echo "<table border='1'>";
        echo "<tr>
                <th>Product Name</th>
                <th>Price</th>";
     
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
            echo "<th>Edit</th><th>Delete</th>";
        }
        
        echo "</tr>";

        foreach ($products as $product) {
            echo "<tr>
                    <td>" . htmlspecialchars($product['name']) . "</td>
                    <td>$" . htmlspecialchars($product['price']) . "</td>";
            
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
                echo "<td><a href='editProduct.php?name=" . urlencode($product['name']) . "'>Edit</a></td>
                      <td><a href='deleteProduct.php?name=" . urlencode($product['name']) . "' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a></td>";
            }
            
            echo "</tr>";
        }
        echo "</table>";
        ?>

        <!-- Show Add Product Form for Admins Only -->
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <div class="admin-add-product">
                <h2>Add Product</h2>
                <form action="addProductController.php" method="post">
                    <input type="text" name="name" placeholder="Product Name" required><br><br>
                    <input type="text" name="price" placeholder="Price" required><br><br>
                    <input type="submit" name="addProduct" value="Add Product">
                </form>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer">
        <div class="footer-links">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a class="fd-1" href="https://www.ubt-uni.net/sq/ballina/">Home</a>
            <a href="#"><i class="far fa-envelope"></i></a>
            <a class="fd-1" href="https://www.google.com/search?q=gmail">About</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i></a>
            <a class="fd-1" href="https://www.google.com/maps/place/Innovation+Campus+-+UBT">Services</a>
            <a href="#"><i class="fas fa-phone"></i></a>
            <a class="fd-1" href="https://www.ubt-uni.net/sq/ubt/kontakti/">Contact</a>
        </div>
    </div>
</body>
</html>
