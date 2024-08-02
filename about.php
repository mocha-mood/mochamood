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
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="style.css">
    <title>About</title>
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
    
    <div class="flex-container">
        
        <div class="card">
            <div>
                <div class="text-content">
                    <h1 > Welcome to <span class="mocha">Mochamood</span></h1> 
                    <p class="first">Introducing a fresh take on coffee</p>                 
                </div>
                <div class="image-content" >
                    <img src="./images/aboutimages/coffee shop.webp" alt="A welcome picture" />
                </div>
            </div>                  
        </div>

    
        <div class="promise card">
        <div class="image-text-content" >
            <div  class="right">
                <img src="./images/aboutimages/coffeevision.jpg" alt="Our vision picture" />
            </div>
            <div class="left">
                <h2>Our Vision</h2>
                <p>We're excited to launch a unique coffee shop experience that blends the convenience of online ordering with the pleasure of enjoying freshly made coffee and snacks. Our vision is to revolutionize the traditional coffee shop model by introducing a seamless, cashier-free service that prioritizes efficiency and customer satisfaction.</p>          
            </div>
        </div>                                    
        </div>

        <div class="card works">
            <section>
                <h2>How It Works</h2>
                <ul>
                    <li><strong>Easy Online Ordering:</strong> Visit our website to browse a tempting menu of beverages and snacks. Place your order and pay online with just a few clicks.</li>
                     <li><strong>Innovative Pickup System:</strong> Arrive at our coffee shop and use the touchscreen to enter your unique order code. The automated shelf box will open to reveal your freshly prepared order.</li>
                    <li><strong>Behind-the-Scenes Magic:</strong> Our skilled baristas and chefs meticulously prepare all coffee and snacks behind the scenes, ensuring each order is made to perfection.</li>
              </ul>
          </section>
        </div>

        <div class="promise card">
            <h2>Our Promise</h2>
            <p>We aim to provide a fast, convenient, and delightful experience for coffee lovers and snack enthusiasts alike. By removing the cashier and streamlining the ordering process, we're not just serving great coffee; we're creating a new way for you to enjoy your favorite treats on the go.</p>
        </div>

       <div class="commitment card">
        <h2>Our Commitment to Sustainability</h2>
        <p>At Mochamood, sustainability is key. We use eco-friendly materials and support local suppliers to minimize our environmental impact.</p>
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