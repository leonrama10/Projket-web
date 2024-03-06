<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E commerce |Register Form</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php include("./partials/header.php") ?>

  <!-- register start -->
  <div class="body">
    <div class="container-box ">
      <header>Sign up</header>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="name" placeholder="name..."> <br><br>
        <input type="text" name="surname" placeholder="surname..."> <br><br>
        <input type="text" name="email" placeholder="email..."> <br><br>
        <input type="text" name="username" placeholder="username..."><br><br>
        <input type="password" name="password" placeholder="password..."><br><br>

        <input type="submit" name="registerBtn" value="register"><br><br></>
        <a href="Login.php">Login</a>
      </form>

      <?php include_once './controller/registerController.php'; ?>

    </div>
  </div>

  <footer class="footer">
    <h1>SneakPeak</h1>
    <div class="boxHolder">
      <div class="first-box">
        <h4>Contact Us</h4>
        <p><strong>Address:</strong> <span>7 Prospect Hill</span></p>
        <p><strong>Phone:</strong> <span> +44 070 6842 8235</span></p>
        <p><strong>ZIP code:</strong> <span> PL9 9ST</span></p>
        <div class="icon">
          <ul>
            <li><i class="fa-brands fa-facebook"></i></li>
            <li><i class="fa-brands fa-instagram"></i></li>
            <li><i class="fa-brands fa-linkedin"></i></li>
          </ul>
        </div>
      </div>

      <div class="second-box">
        <h4>About</h4>
        <p>About Us</p>
        <p>Delivery Information</p>
        <p>Privacy Policy</p>
      </div>

      <div class="third-box">
        <h4>My Account</h4>
        <p>Sign In</p>
        <p>View Cart</p>
        <p>My Website</p>
      </div>
    </div>
  </footer>

  <script src="index.js"></script>
</body>

</html>