<?php
  require_once 'config.php';
  session_start();
  $button_text = isset($_SESSION['id']) ? "Profile" : "Login";
  $button_link = isset($_SESSION['id']) ? "users.php" : "loginandregister.php";
  $is_logged_in = isset($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
    <title>Find Us</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="index.php">MOCHA MOOD</a></div>
            <ul class="links">
                <li><a href="menu.php">Menu</a></li>
                <li><a href="location.php">Find Us</a></li>
                <li><a href="about.php">About Us</a></li>
                <?php if ($is_logged_in): ?>
                <a href="checkout.php" class="cart_icon"><i class="fa-solid fa-basket-shopping"></i></a>
                <?php endif; ?>
            </ul>
        <a href="<?php echo $button_link; ?>" class="action_btn"><?php echo $button_text; ?></a>
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="menu.php">Menu</a></li>
            <li><a href="location.php">Find Us</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="<?php echo $button_link; ?>" class="action_btn"><?php echo $button_text; ?></a></li>
        </div>
    </header>

    <script src="menutoggle.js"></script>
   

    
    <h1 class="h1-loc">Feeling lost? We got you!</h1>
    <div class="main-content-loc">
        <div class="left-content-loc">
            <div class="map-responsive"> 
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13345.068770078418!2d24.924385723658123!3d60.184765199773445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46920983009007af%3A0xb8c1f1d5aaecfc2a!2sStadin%20ammatti-%20ja%20aikuisopisto%2C%20Sturenkatu!5e0!3m2!1sen!2sfi!4v1718122712649!5m2!1sen!2sfi" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  
            </div> 
        </div>

        <div class="right-content-loc">
                <img src="steps.png" alt="123">
        </div>
    </div>

    <div class="container-loc">
                <h1 class="h1-loc">Our other branches, Welcome!</h1>
                <ul class="location-list">   
                    <li><a href="https://maps.app.goo.gl/wATD4oehiMRHdmM19"> Savonkatu </a></li><br><br>
                    <li><a href="https://maps.app.goo.gl/NhDZkMJo21U8zgPNA">Hattulantie</a></li><br><br>
                    <li><a href="https://maps.app.goo.gl/qZAb8hkum5MSyEft8">Teollisuuskatu</a></li>
                </ul> 
    </div>

    <footer id="footer-about">
        <div class="footer-container">
            <div class="footer-left">
                <ul>
                <a href="index.php">
                <img src="logo.png" alt="Mocha Mood Logo">
                </a>
                </ul>
            </div>
            <div class="footer-center">
                <p>2024 Projekti | All right reserved</p>
            </div>
            <div class="footer-right">
                    //add something here in the future 
            </div>
        </div>
    </footer>

    
</body>
</html>