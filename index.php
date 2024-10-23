<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_role'])) {
    header('Location: LOGINFORM.php');  // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                    <li><a href="#">LOCATIONS</a></li>
                    <li><a class="border-a-1" href="reserving.php">RESERVING</a></li>
                    <li><a href="LogOut.php">LOGOUT</a></li> 
                </ul>
            </nav>
        </div>
    </header>

    <div style="background-image: url(images/banner-hamburger.jpg);" class="banner_foto">
        <div class="background-banner">
            <div class="background-text">
                <h2 class="bt-h2-1">dining room now open!</h2>
                <p class="bt-p-1">Join us in our expanded, newly renovated space at our original Adams Morgan location. we've got 50 new indoor seats, beer on draft and a whole lot <br> 
                    of BBQ. Text us at 202-335-5418 to become part of Fed Meat Community and get invites to special events & tastings.
                </p>
                <a class="bt-a-1" href="#">Order pickup</a>
            </div>
        </div>
    </div>

    <div class="all-grid">
        <div class="grid-l">
            <div class="foto-left">
                <img class="fl-img-1" src="images/sandwich-left.webp" alt="logo">
                <h2 class="gl-h2-1">special</h2>
                <p class="gl-p-1">Pitmaster Rob is always up to something! Check out our rotating <br> 
                    specialty sandwiches and limited drops. Dino Beef Short Rib Combo <br> 
                    for 2 is available every Monday & Tuesday.
                </p>
                <a class="gl-a-1" href="#">see the specials</a>
            </div>
        </div>
        <div class="grid-r">
            <div class="foto-right">
                <img class="fr-img-1" src="images/meat-right.jpg" alt="logo">
                <h2 class="gr-h2-1">Supper club</h2>
                <p class="gr-p-1">Once a month, Chef & Pitmaster Rob Sonderman presents a new 4- <br> 
                    course dine-in experience that goes beyond our regular offerings and <br> 
                    puts a smoky spin on gourmet cuisine.
                </p>
                <a class="gr-a-1" href="#">get your ticket</a>
            </div>
        </div>
    </div>

    <div class="grid-pozita-2">
        <div class="gp-2-text">
            <h2 class="gp-2-h2-1">Menu</h2>
            <p class="gp-2-p-1">We’re craft American BBQ made in-house <br> 
                (always). Get traditions and favorites from all <br> 
                over the world — all on one plate. Federalist <br> 
                Pig is a two-time Michelin Bib Gourmand <br> 
                winner serving up DC’s best blend of the <br> 
                classic BBQ traditions you’d find at the most <br> 
                elite cookout and the elevated flavors you’d find <br> 
                at a true fine dining spot.
            </p>
            <p class="gp-2-p-2">Everything we serve is house-made and <br> 
                prepared by a staff that cares. You could spend <br> 
                a lifetime sampling every flavor combination at <br> 
                Federalist Pig, and we hope you do.
            </p>
            <a class="gp-2-a-1" href="#">peep the menu</a>
        </div>
        <div class="gp-2-foto">
            <img class="gp-2-img" src="images/gp-chicken-2.avif" alt="logo">
        </div>
    </div>

    <div class="last-grid">
        <div class="lg-foto">
            <img class="lg-img-1" src="images/lg-food-2.avif" alt="logo">
        </div>
        <div class="lg-text">
            <h2 class="lg-h2-1">Catering</h2>
            <p class="lg-p-1">We'll bring the 'que to you! From backyard <br> 
                BBQs, holiday celebrations or hundred-person <br> 
                events, our Barbecrew and catering truck can <br> 
                do it all. Serving thoughtfully crafted sides, <br> 
                vegan and vegetarian options, to the BBQ <br> 
                classics from all the regions of America, and all <br> 
                the corners of the globe — it’s all here.
            </p>
            <a class="lg-a-1" href="#">explore catering</a>
        </div>
    </div>

    <div class="footer">
        <div class="footer-links">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a class="fd-1" href="https://www.ubt-uni.net/sq/ballina/">Home</a>
            <a href="#"><i class="far fa-envelope"></i></a>
            <a class="fd-1" href="https://www.google.com/search?q=gmail">About</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i></a>
            <a class="fd-1" href="https://www.google.com/maps/place/Innovation+Campus+-+UBT/">Services</a>
            <a href="#"><i class="fas fa-phone"></i></a>
            <a class="fd-1" href="https://www.ubt-uni.net/sq/ubt/kontakti//">Contact</a>
        </div>
    </div>

</body>
</html>
