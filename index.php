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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="homepage.css">
    <title>Home page</title>
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

    <main>
        <section class= background_section id="content">
            <h1>Introducing a Fresh Take on Coffee Shops</h1>
            <p>We're excited to launch a unique coffee shop experience <br>that blends the convenience of online ordering with the pleasure of enjoying freshly made coffee and snacks. <br>Our vision is to revolutionize the traditional coffee shop model by introducing a seamless, <br>cashier-free service that prioritizes efficiency and customer satisfaction.</p>
        </section>

        <section class="basic_section">
            <h1>Our best sellers!</h1>
            <p> Insert three most bought items here</p>
        </section>
    </main>

    <script src="menutoggle.js"></script>

    <!--im going to try making the footer look like coffee hehe-->

    <footer>

        <script src="https://kit.fontawesome.com/eb5a73e7fa.js" crossorigin="anonymous"></script>
        
        <div class="social_icon">
            <ul>
                <li><a href="https://www.linkedin.com/in/lucas-martin-i%C3%B1urrita-174275266/"><i class="fa-solid fa-l"></i></a></li> 
                <li><a href="https://www.linkedin.com/in/tara-alleah-martin/"><i class="fa-solid fa-t"></i></a></li>
                <li><a href="https://www.linkedin.com/in/araba-mariam-a11337266/"><i class="fa-solid fa-m"></i></a></li>
            </ul>
        </div>
        <br><p>2024 Projekti | All right reserved</p>
        <div class="waves"> 
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>

      
        
    </footer>
</body>
</html>