<?php
class Product {
    private $name;
    private $price;
    private $imageUrl;

    function __construct($name, $price, $imageUrl) {
        $this->name = $name;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
    }

    function getName() {
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getImageUrl() {
        return $this->imageUrl;
    }
}
?>
