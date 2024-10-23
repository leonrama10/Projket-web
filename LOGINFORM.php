<?php
require_once 'DatabaseConnection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new DatabaseConnection();
    $conn = $database->startConnection();
    $error_message = '';

    if ($conn) {
        $email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['login_password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid email format";
        } else {
            // Fetch the user by email
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $user = $stmt->fetch();

            // Check if the password matches the one in the database
            if ($user && $password == $user['password']) {
                // Set the user role based on email
                if (in_array($email, ['denisdushi@gmail.com'])) {
                    $_SESSION['user_role'] = 'admin';
                    header("Location: Administrator.php");  // Redirect to Admin Dashboard
                } else {
                    $_SESSION['user_role'] = 'user';
                    header("Location: index.php");  // Redirect to Home Page
                }
                exit();
            } else {
                $error_message = "Invalid email or password";
            }
        }
    } else {
        $error_message = "Failed to connect to the database";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <!-- Show error message if any -->
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form id="logIn" class="input-group" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Login</h2>
                <input type="text" name="login_email" class="input-field" placeholder="Email" required><br><br>
                <input type="password" name="login_password" class="input-field" placeholder="Enter Password" required><br><br>
                <input name="submit_Login" type="submit" class="submit-btn" value="Log In"><br><br>
            </form>

            <!-- Add Sign Up link below the form -->
            <div class="signup-link">
                <p>Don't have an account? <a href="RegisterForm.php">Sign Up</a></p>
            </div>
        </div>
    </div>
</body>
</html>
