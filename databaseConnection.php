<?php


class DatabaseConnection
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dizajn_web";

    function startConnection()
    {
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected succsesfuly";
            return $conn;
        
         
        } catch (PDOException $e) {
            echo "Database Conenction Failed" . $e->getMessage();
            return null;
        }
        
    }
}
/*

PDO::ATTR_ERRMODE is an attribute that controls how PDO reports errors.
PDO::ERRMODE_EXCEPTION is a constant representing a mode for error reporting.
When this mode is set, PDO will throw exceptions when errors occur during database operations

*/
?>