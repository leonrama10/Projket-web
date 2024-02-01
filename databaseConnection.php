<?php
class DatabaseConnection {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dizajn_web";
    private $conn;

    function startConnection() {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
            
            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }

            return $this->conn;
        } catch (Exception $e) {
            echo "Database Connection Failed: " . $e->getMessage();
            return null;
        }
    }
    
}
?>

















?>