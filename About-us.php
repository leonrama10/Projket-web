
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
    <title>Slider and About Us</title>
    <link rel="stylesheet" href="About-us.css">
    

</head>
<body>

<header>
        <h1 class="title">L%D MEAT</h1>
        <nav class="site-nav">
            <ul>
                <!-- <li><a href="Administrator.php">Admin</a></li> -->
                <li><a href="index.php">HOME</a></li>
                    <li><a href="menu.php">MENUS</a></li>
                    <!-- <li><a href="LOGINFORM.php">LOGIN</a></li> -->
                    <li><a href="About-us.php">ABOUT US</a></li>
                    <li><a href="#">LOCATIONS</a></li>
                    <!-- <li><a href="#">REGISTER</a></li> -->
                    <li><a class="border-a-1" href="reserving.php">RESERVING</a></li>
            </ul>
        </nav>
    </header>

<div class="slider-container">
    <button id="prevBtn">&lt;</button>
    <div class="slider-content">
        <div class="slide"><a href="menu.php"><img src="images/menu-foto-1.avif" alt="Image 1" title="this link is going to sent you to menu"></a></div>
        <div class="slide"><a href="menu.php"><img src="images/menu-foto-2.avif" alt="Image 2" title="this link is going to sent you to menu"></a></div>
        <div class="slide"><a href="menu.php"><img src="images/menu-foto-3.avif" alt="Image 3" title="this link is going to sent you to menu"></a></div>
        <div class="slide"><a href="menu.php"><img src="images/menu-foto-4.avif" alt="Image 4" title="this link is going to sent you to menu"></a></div>
    </div>
    <button id="nextBtn">&gt;</button>
</div>

<div class="about-us">
    <h2>About Us</h2>
    <h2>TEST PER GITHUB</h2>
    <p>Welcome to Your Luxury Restaurant's "About Us" page, where our story unfolds in the harmony of culinary artistry and opulent ambiance. Established in 2010, Your Luxury Restaurant has become a symbol of sophistication in the dining landscape.
        Our mission is to provide more than just a meal; we aim to offer an extraordinary experience that transcends expectations. Rooted in a passion for culinary excellence, our chefs meticulously curate menus that showcase the finest ingredients, innovative techniques, and a dedication to creating memorable moments.  
        At Your Luxury Restaurant, we take pride in fostering an environment where each visit is not just a dining experience but a journey through flavors, textures, and culinary traditions. As we continue to evolve, we invite you to be a part of our narrative,
         celebrating the love for exquisite food and the joy of shared moments. Thank you for choosing Your Luxury Restaurant, where every meal tells a story of dedication, creativity, and the pursuit of culinary perfection. 
        </p>
        
        <h3>Our History</h3>
        <p>Founded in 2010, Your Luxury Restaurant has been a beacon of culinary excellence, redefining sophistication in dining.
             Our journey began with a vision to offer a distinctive gastronomic experience that marries innovation and tradition.
            </p>
        
        <h3>Our Values</h3>
        <p>"At Your Luxury Restaurant, our commitment to excellence is reflected in the core values we hold dear: luxury, excellence, and innovation. These values serve as the foundation for every aspect of our culinary journey.
            Luxury: We believe in creating a dining experience that transcends the ordinary, where every detail is thoughtfully curated to provide an atmosphere of opulence and indulgence. 
            Excellence: Our dedication to culinary excellence is unwavering. From the finest ingredients to meticulous preparation, we strive to surpass expectations and deliver exceptional quality in every dish.
            Innovation: Embracing the spirit of innovation, we constantly push boundaries and explore new horizons in the culinary world. Our chefs are passionate about crafting inventive menus that showcase creativity and push the limits of traditional dining. 
            Our commitment to these values is the driving force behind our pursuit of providing more than just a meal. At Your Luxury Restaurant, we invite you to join us in celebrating the artistry of food, the pursuit of excellence, and the joy of unparalleled dining experiences."
        </p>
        
        <h3>Our Team</h3>
        <p>"Step behind the scenes and meet the exceptional individuals who constitute the beating heart of Your Luxury Restaurant. Our team is comprised of distinguished professionals, from our master chefs to our attentive staff, each one devoted to ensuring that every moment of your visit is nothing short of memorable.
            Our Master Chefs: At the helm of our culinary creations are master chefs whose expertise and creativity transform each dish into a masterpiece. Their passion for the art of cooking is reflected in every flavor, texture, and presentation, promising a gastronomic journey like no other.   
            Attentive Staff: Beyond the kitchen, our attentive staff plays a crucial role in curating an unparalleled dining experience. From the moment you step through our doors, our team is dedicated to providing exceptional service, ensuring your comfort, and anticipating your every need.
            Collaborative Spirit: What truly sets our team apart is the collaborative spirit that unites us. We work seamlessly together, drawing on each individual's unique strengths to create a harmonious and welcoming environment for our guests.  
            At Your Luxury Restaurant, our team is more than just a group of individuals; we are a family committed to delivering excellence in every aspect of your dining experience. Join us, and allow our dedicated team to transform your visit into a memorable celebration of culinary artistry and hospitality."
        </p>
</div>

<footer>
    <p>&copy; 2024 Your Restaurant. All rights reserved.</p>
</footer>

<script src="About-us.js"></script>
</body>
</html>