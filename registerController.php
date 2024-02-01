<?php
include_once './userRepository.php';
include_once './user.php';


if(isset($_POST['submit-1'])){
if(empty($_POST['email']) || empty($_POST['password'])){

echo "Fill all fields!";
} else{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User(null,$email,$password);
    $userRepository = new userRepository();

    $userRepository->insertUser($user);
}
}




















?>