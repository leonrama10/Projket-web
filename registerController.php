<?php
include_once './userRepository.php';
include_once './user.php';

if (isset($_POST['submit-2'])) {
    if (empty($_POST['new_username']) || empty($_POST['new_password'])) {
        echo "Fill all fields!";
    } else {
        $newUsername = $_POST['new_username'];
        $newPassword = $_POST['new_password'];

        $user = new User($newUsername, $newPassword);
        $userRepository = new UserRepository();

        $userRepository->insertUser($user);
    }
}
?>





















?>