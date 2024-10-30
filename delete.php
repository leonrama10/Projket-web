<?php
session_start();
include_once './userRepository.php';


if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: index.php");
    exit();
}


$userRepository = new UserRepository();
$userRepository->deleteUser($useremail);


header("Location: Administrator.php");
exit();
?>
