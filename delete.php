<?php

$useremail = $_GET['id'];
include_once './userRepository.php';



$userRepository = new UserRepository();

$userRepository->deleteUser($useremail);

header("location:Administrator.php");


?>
