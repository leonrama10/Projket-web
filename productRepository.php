<?php
include_once 'databaseConnection.php';
class ProductRepository{

    private $connection;

    function __construct()
    {
        $conn = new DatabaseConnection();
        $this->connection = $conn->startConnection();
    }
    function insertProduct($product){
        $conn = $this->connection;
        $name = $product->getName();
        $price = $product->getPrice();

        $sql = "INSERT INTO products (name,price) VALUES (?,?)";
        $statement = $conn->prepare($sql);

        $statement->execute([ $name,$price]);

        header('Location: menu.php');

    }
    function getProducts()
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM products";

        $statement = $conn->query($sql);
        $products = $statement->fetchAll();

        return $products;
    }
    function getProductByName($name) {
        $conn = $this->connection;
        $sql = "SELECT * FROM products WHERE name = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name]);
        return $statement->fetch();
    }
    
    function updateProductByName($name, $newName, $price) {
        $conn = $this->connection;
        $sql = "UPDATE products SET name = ?, price = ? WHERE name = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$newName, $price, $name]);
    }
    
    function deleteProductByName($name) {
        $conn = $this->connection;
        $sql = "DELETE FROM products WHERE name = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$name]);
    }
    
    




















}






















?>