<?php
include_once 'productRepository.php';
$productRepository = new ProductRepository();

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $productRepository->deleteProductByName($name);

    header("Location: menu.php");
    exit();
} else {
    echo "No product specified for deletion.";
    exit();
}
?>
