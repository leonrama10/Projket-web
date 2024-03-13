<?php
class Product{

private $name;
private $price;

function __construct($name,$price){
    $this->name = $name;
    $this->price = $price;
}
function getName(){
    return $this->name;
}
function getPrice (){ 
    return $this->price;
}


}



















?>