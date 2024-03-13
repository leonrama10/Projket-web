<?php
include_once 'productRepository.php';
include_once 'product.php';



if (isset($_POST['addProduct'])) {
    if (
        empty($_POST['name']) || empty($_POST['price'])
    ) {
        echo "Fill all fields!";
    } else {
        $name = $_POST['name'];
    
        $price = $_POST['price'];
        

        $product = new Product($name, $price); 
        $productRepository = new ProductRepository();

        $productRepository->insertProduct($product);
        header('Location: Productshow.php');


    }
}
?>