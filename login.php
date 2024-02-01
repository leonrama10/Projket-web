<?php
ini_set('session.gc_maxlifetime', 3600); // Set session lifetime to 1 hour
session_start();

include 'databaseConnection.php';
$databaseConnection = new DatabaseConnection();
$pdo = $databaseConnection->startConnection();

if (isset($_POST['submit-form'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = '';

    $query = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $query->bindParam(':email', $email);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_role'] = (in_array($email, ['denisdushi@gmail.com', 'leonrama@gmail.com'])) ? 'admin' : 'user';
        header("Home: index.php");
        // Consider using header() to redirect to a different page after successful login
        exit();
    } else {
        $message = 'Invalid email or password';
    }
}
?>
