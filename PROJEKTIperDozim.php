
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
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="menu.html">MENUS</a></li>
                    <li><a href="PROJEKTI.html">LOGIN</a></li>
                    <li><a href="#">CATERING</a></li>
                    <li><a href="#">LOCATIONS</a></li>
                    <li><a href="#">BBQ BOX</a></li>
                    <li><a class="border-a-1" href="reserving.html">RESERVING</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="logIn()">Log In</button>
                <button type="button" class="toggle-btn" onclick="Register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="images/fb.png">
                <img src="images/gp.png">
                <img src="images/tw.png">
            </div>
            <form id="logIn" class="input-group">
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="checkbox"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log In</button>
            </form>
            <form id="Register" class="input-group">
                <input type="text" class="input-field" placeholder="User Id" required>
                <input type="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="checkbox"><span>I agree to the terms & conditions Password</span>
                <button type="submit" class="submit-btn">Register</button>
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

    </script>
 
  

</body>
</html>