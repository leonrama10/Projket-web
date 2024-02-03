<?php 
include_once '../database/databaseConnection.php';

class CartRepository {
    private $connection;

    function __construct() {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function addToCart($emri, $pershkrimi, $cmimi, $pesha) {
        $conn = $this->connection;

        $insertQuery = $conn->prepare("INSERT INTO produket (emri, pershkrimi, cmimi, pesha) VALUES (:emri, :pershkrimi, :cmimi, :pesha)");

        $insertQuery->bindParam(':emri', $emri, PDO::PARAM_STR);
        $insertQuery->bindParam(':pershkrimi', $pershkrimi, PDO::PARAM_STR);
        $insertQuery->bindParam(':cmimi', $cmimi, PDO::PARAM_STR);
        $insertQuery->bindParam(':pesha', $pesha, PDO::PARAM_STR);

        $insertQuery->execute();
    }

    function addToOrders($userId, $totalAmount) {
        $conn = $this->connection;   
       
        $conn->beginTransaction();

        $cartIdQuery = $conn->prepare("SELECT cart_id FROM shopping_cart WHERE user_id = :userId");
        $cartIdQuery->bindParam(':userId', $userId, PDO::PARAM_INT);
        $cartIdQuery->execute();
        $cartId = $cartIdQuery->fetchColumn();

        $updateCartItemsQuery = $conn->prepare("UPDATE cart_items SET ordered = 1, order_date = NOW() WHERE cart_id = :cartId AND ordered = 0");
        $updateCartItemsQuery->bindParam(':cartId', $cartId, PDO::PARAM_INT);
        $updateCartItemsQuery->execute();

        $insertQuery = $conn->prepare("INSERT INTO orders (cart_id, total_amount) VALUES (:cartId, :totalAmount)");
        $insertQuery->bindParam(':cartId', $cartId, PDO::PARAM_INT);
        $insertQuery->bindParam(':totalAmount', $totalAmount, PDO::PARAM_STR);
        $insertQuery->execute();

        $conn->commit();
    }

 
    function getAllProducts($id){
        $conn = $this->connection;
    
        $sql = "SELECT * FROM produket WHERE id IN (SELECT product_id FROM cart_items WHERE cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = :userId) AND ordered = 0)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $cart;
    }
    
    function removeCartDataFromDatabase($itemId,$userId) {
        $conn = $this->connection;
    
        try {
            $deleteQuery = $conn->prepare("DELETE FROM cart_items WHERE item_id = :itemId AND cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = :userId)");
            $deleteQuery->bindParam(':itemId', $itemId, PDO::PARAM_INT);
            $deleteQuery->bindParam(':userId', $userId, PDO::PARAM_INT);
            $deleteQuery->execute();
    
            $rowCount = $deleteQuery->rowCount();
    
            if ($rowCount > 0) {
                $updatedCartData = $this->fetchCartDataFromDatabase($userId);
                echo json_encode($updatedCartData);
            } else {
                echo json_encode([]);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
    
    function fetchCartDataFromDatabase($userId) {
        $conn = $this->connection;
    
        $stmt = $conn->prepare("SELECT * FROM cart_items WHERE cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = :userId) AND ordered = 0");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        $cartData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $cartData;
    }
    
    function fetchFromOrder($userId) {
        $conn = $this->connection;
    
        $stmt = $conn->prepare("
            SELECT o.order_id, o.cart_id, o.order_date, o.total_amount, c.cmimi, c.emri, c.image, c.product_id
            FROM orders o
            JOIN produket c ON o.cart_id = c.cart_id
            WHERE o.cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = :userId)
        ");
    
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        $cartData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $cartData;
    }
    
}
?>
