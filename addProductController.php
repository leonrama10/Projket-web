<?php
include_once 'Product.php';
include_once 'ProductRepository.php';
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: menu.php');
    exit();
}

if (isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $imageUrl = '';

 
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imageUrl = 'uploads/' . $imageName;

      
        if (!is_dir('uploads')) {
            mkdir('uploads', 0755, true);
        }

        if (move_uploaded_file($imageTmp, $imageUrl)) {
            $product = new Product($name, $price, $imageUrl);
            $productRepository = new ProductRepository();
            $productRepository->insertProduct($product);
            header('Location: menu.php');
            exit();
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Please select an image.";
    }
}
?>
