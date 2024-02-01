<?php
include_once './userRepository.php';
include_once './user.php';


if(isset($_POST['submit-form'])){
if(empty($_POST['name']) || empty($_POST['phoneNumber']) || empty($_POST['email']) || empty($_POST['password'])){

echo "Fill all fields!";
} else{
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new user(null,$name,$phone,$email,$password);
    $userRepository = new userRepository();

    $userRepository->insertUser($user);
}
}




















?>