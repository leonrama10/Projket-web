    <?php
    $useremail = $_GET['id'];

    include_once './userRepository.php';

    $userRepository = new UserRepository();
    $user = $userRepository->getUserByEmail($useremail);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
        <link rel="stylesheet" href="edit.css"> 
    </head>
    <body>

        <header>
            <div class="site-logo">
                <h1 class="s-l-h1-1">L&D MEAT</h1>
            </div>
            <nav class="site-nav">
                <ul class="site-nav_menu">
                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        <li><a href="Administrator.php">ADMIN</a></li>
                    <?php endif; ?>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="menu.php">MENUS</a></li>
                    <li><a href="About-us.php">ABOUT US</a></li>
                    <li><a href="reserving.php">RESERVING</a></li>
                    <li><a href="LogOut.php">LOGOUT</a></li>
                </ul>
            </nav>
        </header>


        <div class="form-container">
            <h3>Edit User</h3>
            <form action="" method="post">
                <input type="text" name="email" value="<?= htmlspecialchars($user['email']); ?>" required> <br>
                <input type="text" name="password" value="<?= htmlspecialchars($user['password']); ?>" required> <br>
                <input type="submit" name="editBtn" value="Save">
            </form>
        </div>
        <div class="footer">
            <div class="footer-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a class="fd-1" href="https://www.ubt-uni.net/sq/ballina/">Home</a>
                <a href="#"><i class="far fa-envelope"></i></a>
                <a class="fd-1" href="https://www.google.com/search?q=gmail">About</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                <a class="fd-1" href="https://www.ubt-uni.net/sq/ubt/kontakti/">Contact</a>
            </div>
        </div>
    </body>
    </html>

    <?php 
    if (isset($_POST['editBtn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userRepository->updateUser($email, $password, $useremail);
        header("Location: Administrator.php");
        exit();
    }
    ?>
