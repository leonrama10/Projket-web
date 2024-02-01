<?php
class user{
private $ID;

private $email;
private $password;

function __construct($ID,$email,$password){
$this->ID = $ID;
$this->email = $email;
$this->password = $password;
}
function getID(){
    return $this->ID;
}
function getEmail(){
    return $this->email;
}
function getPassword(){
    return $this->password;
}



















}



















?>