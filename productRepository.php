<?php
include_once './databaseConnection.php';

class ProductRepository {
    private $connection;

    function __construct() {
        $conn = new DatabaseConnection();
        $this->connection = $conn->startConnection();
    }

    function insertProduct($product) {
        $conn = $this->connection;
        $name = $product->getName();
        $price = $product->getPrice();
        $imageUrl = $product->getImageUrl();

        $sql = "INSERT INTO products (name, price, image_url) VALUES (?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$name, $price, $imageUrl]);
        header('Location: menu.php');
    }

    function getProducts() {
        $conn = $this->connection;
        $sql = "SELECT * FROM products";
        $statement = $conn->query($sql);
        return $statement->fetchAll();
    }

    function getProductByName($name) {
        $conn = $this->connection;
        $sql = "SELECT * FROM products WHERE name = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name]);
        return $statement->fetch();
    }

   
    function deleteProductByName($name) {
        $conn = $this->connection;
        $sql = "DELETE FROM products WHERE name = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name]);
    }

    function updateProductByName($name, $newName, $price, $imageUrl = null) {
        $conn = $this->connection;
        if ($imageUrl) {
            $sql = "UPDATE products SET name = ?, price = ?, image_url = ? WHERE name = ?";
            $statement = $conn->prepare($sql);
            $statement->execute([$newName, $price, $imageUrl, $name]);
        } else {
            $sql = "UPDATE products SET name = ?, price = ? WHERE name = ?";
            $statement = $conn->prepare($sql);
            $statement->execute([$newName, $price, $name]);
        }
    }
}
?>
