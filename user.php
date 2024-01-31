<?php
class user{
private $ID;
private $name;
private $phoneNumber;
private $email;
private $password;

function __construct($ID,$name,$phoneNumber,$email,$password){
$this->ID = $ID;
$this->name = $name;
$this->phoneNumber = $phoneNumber;
$this->email = $email;
$this->password = $password;
}
function getID(){
    return $this->ID;
}
function getname(){
    return $this->name;
}
function getphoneNumber(){
    return $this->phoneNumber;
}
function getEmail(){
    return $this->email;
}
function getPassword(){
    return $this->password;
}



















}



















?>