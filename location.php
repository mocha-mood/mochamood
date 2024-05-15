<?php
  require_once 'config.php';
  session_start();
  $button_text = isset($_SESSION['id']) ? "Profile" : "Login";
  $button_link = isset($_SESSION['id']) ? "users.php" : "loginandregister.php";
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
           
            <!-- Additional left content can go here -->
        </div>
        <div class="right-content-loc">
            <div class="container-loc">
                <h1 class="h1-loc">Our Locations</h1>
                <ul class="location-list">   
                    <li><a href="https://www.google.com/maps/search/?api=1&query=10+Kilonkallio,+Espoo,+Finland"> Kilo </a></li><br><br>
                    <li><a href="https://www.google.com/maps/search/?api=1&query=4+Mirjankuja,+Espoo,+Finland">Matinkylä</a></li><br><br>
                    <li><a href="https://www.google.com/maps/search/?api=1&query=55+Jokipoikasenkaari,+Helsinki,+Finland">Helsinki</a></li>
                </ul> 
            </div>
        </div>
    </div>

</body>
</html>