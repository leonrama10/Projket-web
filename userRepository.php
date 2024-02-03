<?php
include './databaseConnection.php';
include './user.php';
class userRepository{
private $connection;
function __construct(){
    $conn = new DatabaseConnection;
    $this->connection = $conn->startConnection();
}
function insertUser($user){
$conn = $this->connection;

$id = $user->getID();
$email = $user->getEmail();
$password = $user->getPassword();

$sql = "INSERT INTO user(ID,email,password) VALUES (?,?,?)";

$statement = $conn->prepare($sql);
$statement->execute([$id,$email,$password]);

echo "<script> alert('User has been inserted succsesfuly'); </script>";
}
function getAllUsers(){

$conn = $this->connection;
$sql = "SELECT * FROM user";

$statement = $conn->query($sql);
$users = $statement->fetchAll();
return $users;
}

function getUserById($ID){
    $conn = $this->connection;

    $sql = "SELECT * FROM user WHERE ID='$ID'";

    $statement = $conn->query($sql);
    $user = $statement->fetch();
    return $user;
}
function updateUser($ID, $email, $password){
    $conn = $this->connection;
    $sql = "UPDATE user SET  email = ?, password = ? WHERE ID = ?";

    $statement = $conn->prepare($sql);

    $statement->execute([$email, $password, $ID]);
   
    echo "<script> alert('update was successful');</script>";
}

function deleteUser($ID){
    $conn = $this->connection;
    $sql = "DELETE FROM user WHERE ID=?";

    $statement = $conn->prepare($sql);
    $statement->execute([$ID]);

    echo "<script>alert('delete was successful');</script>";
}














}



















?>