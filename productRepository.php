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




















}






















?>