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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
    <title>Checkout</title>
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

    <div class="wrapper">
        <h1>Checkout</h1>
        <div class ="checkout">
            <div class="shop">

                <div class="boxcheckout">
                    <img src="images/latte.webp" alt="Latte">
                    <div class="contentcheckout">
                        <h3>Latte</h3>
                        <h4>Price: €7</h4>
                        <p class="unit"><input value ="2"></p>
                        <p class="btn-area-checkout">
                            <i class="fa fa-trash"></i>
                            <span class="btncheckout">Remove</span>
                        </p>
                    </div>
                </div>

                <div class="boxcheckout">
                    <img src="images/capuccino.webp" alt="Cappuccino">
                    <div class="contentcheckout">
                        <h3>Cappuccino</h3>
                        <h4>Price: €4.60</h4>
                        <p class="unit"><input value ="1"></p>
                        <p class="btn-area-checkout">
                            <i class="fa fa-trash"></i>
                            <span class="btncheckout">Remove</span>
                        </p>
                    </div>
                </div>

                <div class="boxcheckout">
                    <img src="images/white-coffee.webp" alt="White Coffee">
                    <div class="contentcheckout">
                        <h3>White Coffee</h3>
                        <h4>Price: €15</h4>
                        <p class="unit"><input value ="3"></p>
                        <p class="btn-area-checkout">
                            <i class="fa fa-trash"></i>
                            <span class="btncheckout">Remove</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="right-bar">
                <p><span>Subtotal</span> <span>€26.60</span></p>
                <hr>
                <p><span>Tax(5%)</span> <span>€1.33</span></p>
                <hr>
                <p><span>Total</span> <span>€27.93</span></p>

                <a href="#"><i class="fa fa-shopping-cart"></i>Checkout</a>
            </div>

        </div>
    </div>
</body>
</html>