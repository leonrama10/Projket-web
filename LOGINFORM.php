    <!DOCTYPE html>


    <head>
        <title>LogIn and Registration Form</title>
    <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <header>
            <div class="container">
                <div class="site-logo">
                    <h1 class="s-l-h1-1">L&D MEAT</h1>
                </div>
                <nav class="site-nav">
                    <ul class="site-nav_menu">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="menu.php">MENUS</a></li>
                        <li><a href="LOGINFORM.php">LOGIN</a></li>
                        <li><a href="About-us.php">ABOUT US</a></li>
                        <li><a href="#">LOCATIONS</a></li>
                        <li><a href="RegisterForm.php">REGISTER</a></li>
                        <li><a class="border-a-1" href="reserving.php">RESERVING</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="hero">
            <div class="form-box">
                <!-- <div class="button-box">
                    <button type="button" class="toggle-btn" onclick="logIn()">Log In</button>
                </div> -->
                <div class="social-icons">
                    <img src="images/fb.png">
                    <img src="images/gp.png">
                    <img src="images/tw.png">
                </div>
                
                
                <form id="logIn" class="input-group" method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit=" return validateLogin()">
                <p class="login">SEKS</p>
                <input type="text" name="login_email" class="input-field" placeholder="User Id" required>
                <input type="password" name="login_password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="checkbox"><span>Remember Password</span>
                <input name="submit_Login" type = "submit" class="submit-btn" value="Log In">
                </form>
            

            </div>
        
        </div>
        <script>
            
            var x = document.getElementById("logIn");
            var y = document.getElementById("Register");
            var z = document.getElementById("btn");

            function Register(){
                x.style.left ="-400px";
                y.style.left ="50px";
                z.style.left ="110px"
            }
            function logIn(){
                x.style.left ="50px";
                y.style.left ="450px";
                z.style.left ="0"
            }

            function validateLogin() {
        var emailInput = document.getElementById("login_email").value;
        var passwordInput = document.getElementById("login_password").value;

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