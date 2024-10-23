

<?php
session_start();

if (!isset($_SESSION['user_role'])) {
    header('Location: LOGINFORM.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>

    <link rel="stylesheet" href="menu.css">



</head>
<body>

    <header>
        <div class="container">
            <div class="site-logo">
                
                <h1 class="s-l-h1-1">L&D MEAT</h1>
            </div>
            <nav class="site-nav">
                
                <ul class="site-nav_menu">
                    <!-- <li><a href="Administrator.php">Admin</a></li> -->
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">MENUS</a></li>
                    <!-- <li><a href="LOGINFORM.php">LOGIN</a></li> -->
                    <li><a href="About-us.php">ABOUT US</a></li>
                    <li><a href="#">LOCATIONS</a></li>
                    <!-- <li><a href="RegisterForm.php">REGISTER</a></li> -->
                    <li><a class="border-a-1" href="reserving.php">RESERVING</a></li>
                    <li><a href="LogOut.php">LOGOUT</a></li>  
                </ul>
            </nav>
        </div>
    </header>
    <?php
                
                include_once 'addProduct.php';
                ?>
     <div class="footer">
      <div class="footer-links">
          <a href="#"><i class="fab fa-instagram"></i></a>
        <a class="fd-1" href="https://www.ubt-uni.net/sq/ballina/">Home</a>
        <a href="#"><i class="far fa-envelope"></i></a>
        <a class="fd-1" href="https://www.google.com/search?q=gmail&oq=gmail+&gs_lcrp=EgZjaHJvbWUqBggAEEUYOzIGCAAQRRg7MhIIARAAGBQYgwEYhwIYsQMYgAQyEggCEAAYFBiDARiHAhixAxiABDINCAMQABiDARixAxiABDINCAQQABiDARixAxiABDIKCAUQABixAxiABDIGCAYQRRg8MgYIBxBFGD3SAQg5OTIwajBqNKgCALACAA&sourceid=chrome&ie=UTF-8">About</a>
        <a href="#"><i class="fas fa-map-marker-alt"></i></a>
        <a class="fd-1" href="https://www.google.com/maps/place/Innovation+Campus+-+UBT/@42.5582459,21.1317994,16.25z/data=!4m5!3m4!1s0x13549d2cc6e13dd5:0xf9155209d4ad0657!8m2!3d42.5581825!4d21.1347087">Services</a>
        <a href="#"><i class="fas fa-phone"></i></a>
        <a class="fd-1" href="https://www.ubt-uni.net/sq/ubt/kontakti//">Contact</a>
      </div>
  </div>
    
</body>
</html>