<?php
ini_set('session.gc_maxlifetime', 3600);
session_start();

include 'databaseConnection.php';
$databaseConnection = new DatabaseConnection();
$pdo = $databaseConnection->startConnection();

if (isset($_POST['submit-1'])) {
    $email = $_POST['email'];
    $password = $_POST['new_password'];
    $message = '';

    $query = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    $user = $query->fetch();

    if ($user && password_verify($password, $User['password'])) {
        $_SESSION['user_role'] = (in_array($email, ['denisdushi@gmail.com', 'leonrama@gmail.com'])) ? 'admin' : 'user';
        header("Home: index.php");
        
        exit();
    } else {
        $message = 'Invalid email or password';
    }
}
?>
