<?php
require_once 'DatabaseConnection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new DatabaseConnection();
    $conn = $database->startConnection();

    if ($conn) {
        $email = filter_var($_POST['Register_email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['Register_password'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid email format";
        } elseif (strlen($password) < 8) {
            $error_message = "Password must be at least 8 characters";
        } else {
           
            $stmt = $conn->prepare("INSERT INTO user (email, password) VALUES (?, ?)");
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $password);

            if ($stmt->execute()) {
                $_SESSION['user_role'] = 'user';  
                header("Location: index.php"); 
                exit();
            } else {
                $error_message = "Registration failed";
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
    <title>Register Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
<div class="register-container">
        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <h2>Register</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateRegister()">
            <input type="text" id="Register_email" name="Register_email" placeholder="Email" required>
            <input type="password" id="Register_password" name="Register_password" placeholder="Password" required>
            <input type="submit" value="Register">
            <a href="LOGINFORM.php">Already have an account</a>
        </form>
    </div>
    <script>
    function validateRegister() {
        var emailInput = document.getElementById("Register_email").value;
        var passwordInput = document.getElementById("Register_password").value;

        if (emailInput.indexOf('@') === -1) {
            alert("Email address must contain at least one '@' character.");
            return false;
        }

        if (passwordInput.trim() === "") {
            alert("Password field cannot be empty.");
            return false;
        }

        if (!isValidPassword(passwordInput)) {
            alert("Password must contain at least one uppercase letter, one number, and one special character.");
            return false;
        }

        return true;
    }
    function isValidPassword(password) {
        var uppercaseRegex = /[A-Z]/;
        var numberRegex = /\d/;
        var specialCharacterRegex = /[!@#$%^&*(),.?":{}|<>]/;

        return uppercaseRegex.test(password) &&
            numberRegex.test(password) &&
            specialCharacterRegex.test(password) &&
            password.length >= 8;
    }
    </script>

</body>
</html>
