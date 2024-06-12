<?php

session_start();
require_once 'config.php';
if(!isset($_SESSION['id'])) {
    header("Location: loginandregister.php");
    exit;
}

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
    <title>Profile</title>
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

    <?php

        $id = $_SESSION['id']; 

        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $date = $row['created_at'];
        }
        
    ?>

    <div class="containerprofile">
        <div class="profile">
            <div class="profile-header">
                <img src="profile.png" alt="" class="profile-img">
                <div class="profile-text-container">
                    <h1 class="profile-title">Hello <?php echo $username ?>!</h1>
                    <p class="profile-email"><?php echo $email ?></p>
                </div>
                </div>
                
                <div class="menu-profile">
                    <a href="" class="menuprofile-link"><i class="fa-solid fa-circle-user menu-icon">Account</i></a>
                    <a href="" class="menuprofile-link"><i class="fa-solid fa-mug-saucer menu-icon">Orders</i></a>
                    <a href="" class="menuprofile-link"><i class="fa-solid fa-gear menu-icon">Settings</i></a>
                    <a href="logout.php" class="menuprofile-link"><i class="fa-solid fa-right-from-bracket menu-icon">Logout</i></a>
                </div>
            </div>

        <form class="account-profile">
            <div class="account-profile-header">
                <h1 class="account-title">Account Setting</h1>
                <div class="btn-container-profile">
                    <button class="btn-cancel-prof">Cancel</button>
                    <button class="btn-save-prof">Save</button>
                </div>
            </div>

            <div class="account-edit">
                <div class="input-containerprof">
                    <label>Username</label>
                    <input type="text" placeholder="<?php echo $username ?>">
                </div>

                <div class="input-containerprof">
                    <label>Email</label>
                    <input type="email" placeholder="<?php echo $email ?>">
                </div>

                <div class="input-containerprof">
                    <label>Password</label>
                    <input type="password" placeholder="<?php echo $password ?>">
                </div>

                <div class="input-containerprof">
                    <label>Account made</label>
                    <p class="profile-email"><?php echo $date ?></p>
                </div>

                
            </div>
        </form>

        </div>
    
</body>
</html>