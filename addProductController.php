<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: menu.php'); 
    exit();
}

include_once 'product.php';
include_once 'productRepository.php';

if (isset($_POST['addProduct'])) {
    if (empty($_POST['name']) || empty($_POST['price'])) {
        echo "All fields are required!";
    } else {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $product = new Product($name, $price);
        $productRepository = new ProductRepository();
        $productRepository->insertProduct($product);

        header('Location: menu.php'); 
        exit();
    }
}
?>
