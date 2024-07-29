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
    <link rel="stylesheet" href="menu.css">
    <title>Menu</title>
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

    <section> 
        <h1 style="text-align:center"><br>FRESHLY MADE COFFEE AND SNACKS</h1>
    </section>

    <div class="search-wrapper">
        <label for="search"><i class="fa-solid fa-magnifying-glass"></i></label>
        <input type="search" id="search" placeholder="Search product...">
    </div>

    <div class="button-wrapper">
        <button id="show-all" class="action_btn">All</button>
        <button id="show-coffees" class="action_btn">Coffees</button>
        <button id="show-snacks" class="action_btn">Snacks</button>
    </div>

  
    <div class="zone grid-wrapper" id="all-list"></div>
    <div class="zone grid-wrapper" id="coffee-list" style="display: none;"></div>
    <div class="zone grid-wrapper" id="snack-list" style="display: none;"></div>
    
    <script src="menu.js"></script>

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