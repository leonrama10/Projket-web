<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "MariaDB");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    $sql = "INSERT INTO user (username, password, role) VALUES ('$newUsername', '$newPassword', 'user')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
