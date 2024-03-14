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
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user && $password ==  $user['password']) {
                // $_SESSION['user_role'] = (in_array($email, ['denisdushi@gmail.com', 'leonrama@gmail.com'])) ? 'admin' : 'user';
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Invalid email or passwordssss";
            }
        }
    } else {
        $error_message = "Failed to connect to the database";
    }
}
?>

   <!DOCTYPE html>


    <head>
        <title>LogIn and Registration Form</title>
    <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="social-icons">
                    <img src="images/fb.png">
                    <img src="images/gp.png">
                    <img src="images/tw.png">
                </div>
                
                
                <form id="logIn" class="input-group" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateLogin()">
                <?php if (!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
                <?php endif; ?>
                <?php if (!empty($error_message)): ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <h2>Login</h2>
                <input type="text" name="login_email" class="input-field" placeholder="User Id" required>
                <input type="password" name="login_password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="checkbox"><span>Remember Password</span>
                <input name="submit_Login" type = "submit" class="submit-btn" value="Log In">
                <a href="menu.php"><input name="submit_Login" type = "submit" class="submit-btn" value="Log In"></a><!-- e kom shtu -->
                <!-- Ketu kena me ba kur te behet login te dergohet tek menu -->
                </form>
            

            </div>
        
        </div>
        <script>
            
            var x = document.getElementById("logIn");
            var y = document.getElementById("Register");
            var z = document.getElementById("btn");

            // function Register(){
            //     x.style.left ="-400px";
            //     y.style.left ="50px";
            //     z.style.left ="110px"
            // }
            function logIn(){
                x.style.left ="50px";
                y.style.left ="450px";
                z.style.left ="0"
            }

            function validateLogin() {
                var emailInput = document.forms["logIn"]["login_email"].value;
        var passwordInput = document.forms["logIn"]["login_password"].value;
        if (emailInput.trim() === "" || loginPassword.trim() === "") {
            alert("Please enter your email.");
            return false;
        }
        if (passwordInput.trim() === "") {
        alert("Please enter your password.");
        return false;
        }

        if (!isValidPassword(passwordInput)) {
            alert("Fjalëkalimi duhet të përmbajë të paktën një shkronjë të madhe, një numër dhe një karakter të veçantë.");
            return false;
        }

        window.location.href = "index.php";

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