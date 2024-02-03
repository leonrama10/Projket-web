<?php
include './databaseConnection.php';
include './user.php';

class UserRepository {
    private $connection;

    function __construct() {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser($user) {
        $conn = $this->connection;

      
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user(email,password) VALUES (?,?)";

        $statement = $conn->prepare($sql);
        $statement->execute([$email, $password]);

        echo "<script> alert('User has been inserted successfully'); </script>";
    }

    function getAllUsers() {
        $conn = $this->connection;
        $sql = "SELECT * FROM user";

        $result = $conn->query($sql);

        if ($result) {
            $users = $result->fetch_all(MYSQLI_ASSOC);
            return $users;
        } else {
            echo "<script> alert('Error fetching users'); </script>";
            return [];
        }
    }

    function getUserById($ID) {
        $conn = $this->connection;
        $sql = "SELECT * FROM user WHERE ID='$ID'";

        $result = $conn->query($sql);

        if ($result) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            echo "<script> alert('Error fetching user by ID'); </script>";
            return null;
        }
    }

    function updateUser($ID, $email, $password) {
        $conn = $this->connection;
        $sql = "UPDATE user SET email = ?, password = ? WHERE ID = ?";

        $statement = $conn->prepare($sql);
        $statement->bind_param('ssi', $email, $password, $ID);
        $statement->execute();

        echo "<script> alert('Update was successful');</script>";
    }

    function deleteUser($ID) {
        $conn = $this->connection;
        $sql = "DELETE FROM user WHERE ID=?";

        $statement = $conn->prepare($sql);
        $statement->bind_param('i', $ID);
        $statement->execute();

        echo "<script>alert('Delete was successful');</script>";
    }
}
?>
