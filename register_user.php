<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './userRepository.php';

    $userRepository = new UserRepository();

    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    // Create a new user instance
    $newUser = new User(null, null, null, $newUsername, $newPassword);

    // Insert the new user using the repository
    $userRepository->insertUser($newUser);
}
?>
