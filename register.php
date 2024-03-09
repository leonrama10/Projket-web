<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "dizajn_web");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $newUsername = $_POST['username'];
    $newPassword = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, 'user')");
    $stmt->bind_param("ss", $newUsername, $newPassword);

    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

