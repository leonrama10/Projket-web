<?php
ini_set('session.gc_maxlifetime', 3600);
session_start();

include 'databaseConnection.php';
$databaseConnection = new $databaseConnection();
$pdo = $databaseConnection->startConnection();

if (isset($_POST['submit_Login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];
    $message = '';

    $query = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $query->bindParam(':email', $email);
    $query->execute();

    $user = $query->fetch();

    if ($user && password_verify($password, $User['login_password'])) {
        $_SESSION['user_role'] = (in_array($email, ['denisdushi@gmail.com', 'leonrama@gmail.com'])) ? 'admin' : 'user';
        header("Home: index.php");
        
        exit();
    } else {
        $message = 'Invalid email or password';
    }
}
?>
