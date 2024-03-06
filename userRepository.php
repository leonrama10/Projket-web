<?php
include_once './databaseConnection.php';

class UserRepository
{
    private $connection;

    function __construct()
    {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user)
    {
        $conn = $this->connection;
        $email = $user->getEmail();
        $password = $user->getPassword();
       

        $sql = "INSERT INTO user (email,password) VALUES (?,?)";

        $statement = $conn->prepare($sql);

        try{
        $statement->execute([ $email, $password]);
        header('Location: menu.php');
        } catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }

    function getAllUsers()
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM user";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

  


    function getUserByEmailAndPassword($email, $password)
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";

        $statement = $conn->query($sql);

        $user = $statement->fetch();

        return $user;
    }

    function updateUser($email, $password)
    {
        $conn = $this->connection;

        $sql = "UPDATE user SET  email=?, password=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$email,$password]);

        echo "<script>alert('update was successful'); </script>";
    }

    function deleteUser($id)
    {
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE email=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
    }
}
?>