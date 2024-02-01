<?php
ini_set('session.gc_maxlifetime', 3600); // Set session lifetime to 1 hour
session_start();

include 'databaseConnection.php';
$databaseConnection = new DatabaseConnection();
$pdo = $databaseConnection->startConnection();

if (isset($_POST['submit-1'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = '';

    $query = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $query->bind_param(':email', $email);
    $query->execute();

    $user = $query->fetch();

    if ($user && password_verify($password, $User['password'])) {
        $_SESSION['user_id'] = $User['ID'];
        $_SESSION['user_role'] = (in_array($email, ['denisdushi@gmail.com', 'leonrama@gmail.com'])) ? 'admin' : 'user';
        header("Home: index.php");
        // Consider using header() to redirect to a different page after successful login
        exit();
    } else {
        $message = 'Invalid email or password';
    }
}
?>
