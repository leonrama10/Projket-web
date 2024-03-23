<?php session_start();


include_once 'productRepository.php';
include_once 'userRepository.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Productshow.css">
</head>


<body>

    <?php include("header.php") ?>

    <!-- <div id="product1">
        <?php if (isset($_SESSION['is_authenticated'])): ?>

            <a href="add-product.php">
                Add product
            </a>

        <!-- <?php endif; ?> -->
  
  
      <div class="pro-container">
    <?php
    $productRepository = new ProductRepository();
    $userRepository = new UserRepository();
    $products = $productRepository->getProducts();
    foreach ($products as $product) {
        echo '
            <div class="product-item">
                <span class="product-name">' . htmlspecialchars($product["name"]) . '</span>
                <span class="product-price">Price: $' . htmlspecialchars($product['price']) . '</span>
            </div>
        ';
    }
    ?>
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