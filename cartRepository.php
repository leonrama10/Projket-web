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
    
        $insertQuery = $conn->prepare("INSERT INTO produket (emri, pershkrimi, cmimi, pesha) VALUES (?, ?, ?, ?)");
    
        $insertQuery->bind_param('sssd', $emri, $pershkrimi, $cmimi, $pesha);
        $insertQuery->execute();
        $insertQuery->close();
    }
    
    function addToOrders($userId, $totalAmount) {
        $conn = $this->connection;
    
        $conn->begin_transaction();
    
        $cartIdQuery = $conn->prepare("SELECT cart_id FROM shopping_cart WHERE user_id = ?");
        $cartIdQuery->bind_param('i', $userId);
        $cartIdQuery->execute();
        $cartIdResult = $cartIdQuery->get_result();
        $cartId = $cartIdResult->fetch_assoc()['cart_id'];
    
        $updateCartItemsQuery = $conn->prepare("UPDATE cart_items SET ordered = 1, order_date = NOW() WHERE cart_id = ? AND ordered = 0");
        $updateCartItemsQuery->bind_param('i', $cartId);
        $updateCartItemsQuery->execute();
    
        $insertQuery = $conn->prepare("INSERT INTO orders (cart_id, total_amount) VALUES (?, ?)");
        $insertQuery->bind_param('id', $cartId, $totalAmount);
        $insertQuery->execute();
    
        $conn->commit();
    }
    function getAllProducts($id){
        $conn = $this->connection;
    
        $sql = "SELECT * FROM produket WHERE id IN (SELECT product_id FROM cart_items WHERE cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = ?) AND ordered = 0)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $cart = $result->fetch_all(MYSQLI_ASSOC);
    
        return $cart;
    }
    function removeCartDataFromDatabase($itemId, $userId) {
        $conn = $this->connection;
    
        try {
            $deleteQuery = $conn->prepare("DELETE FROM cart_items WHERE item_id = ? AND cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = ?)");
            $deleteQuery->bind_param('ii', $itemId, $userId);
            $deleteQuery->execute();
    
            $rowCount = $deleteQuery->affected_rows;
    
            if ($rowCount > 0) {
                $updatedCartData = $this->fetchCartDataFromDatabase($userId);
                echo json_encode($updatedCartData);
            } else {
                echo json_encode([]);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } 
    function fetchCartDataFromDatabase($userId) {
        $conn = $this->connection;
    
        $stmt = $conn->prepare("SELECT * FROM cart_items WHERE cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = ?) AND ordered = 0");
        $stmt->bind_param('i', $userId);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $cartData = $result->fetch_all(MYSQLI_ASSOC);
    
        return $cartData;
    }
      
    function fetchFromOrder($userId) {
        $conn = $this->connection;
    
        $stmt = $conn->prepare("
            SELECT o.order_id, o.cart_id, o.order_date, o.total_amount, c.cmimi, c.emri, c.image, c.product_id
            FROM orders o
            JOIN produket c ON o.cart_id = c.cart_id
            WHERE o.cart_id = (SELECT cart_id FROM shopping_cart WHERE user_id = ?)
        ");
    
        $stmt->bind_param('i', $userId);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $cartData = $result->fetch_all(MYSQLI_ASSOC);
    
        return $cartData;
    }

    
}
?>
