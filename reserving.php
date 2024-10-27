<?php
session_start();


if (!isset($_SESSION['user_role'])) {
    header('Location: LOGINFORM.php'); 
    exit();
}


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Reservation</title>
    <link rel="stylesheet" href="reserving.css">
</head>
<body>

    <header>
        <div class="container">
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
                    <li><a href="https://www.google.com/maps/dir//UBT+College,+10000+Bulevardi+Bill+Klinton,+Prishtina/@42.6532375,21.0700476,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x13549f47a5602081:0xec721f5ff5e05ca0!2m2!1d21.1462653!2d42.6532375?entry=ttu&g_ep=EgoyMDI0MTAyMy4wIKXMDSoASAFQAw%3D%3D">LOCATIONS</a></li>
                    <li><a class="border-a-1" href="reserving.php">RESERVING</a></li>
                    <li><a href="LogOut.php">LOGOUT</a></li> 
                </ul>
            </nav>
        </div>
    </header>

    <div class="reservation-container">
        <h1>Make a Reservation</h1>
        <form id="reservationForm">
            <input type="text" id="name" placeholder="Your Name" required>
            <input type="email" id="email" placeholder="Your Email" required>
            <input type="date" id="date" required>
            <input type="time" id="time" required>
            <textarea id="comments" placeholder="Any special requests or comments"></textarea>
            <button type="submit">Make Reservation</button>
        </form>
        <div id="reservationStatus"></div>
    </div>

    <script src="reserving.js"></script>
</body>
</html>
