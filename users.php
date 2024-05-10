<?php

session_start();
require_once 'config.php';
if(!isset($_SESSION['id'])) {
    header("Location: loginandregister.php");
    exit;
}

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
                <li><a href="logout.php">Log out</a></li>
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
            <li><a href="logout.php">Log out</a></li>
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
        }
        
    ?>

    <section> 
        <h1><br>USER INFO AND PAST ORDER INFO HERE(?)</h1>

        <p>Hi <b><?php echo $username ?></b>!</p>
        <p>Your email is <b><?php echo $email ?></b></p>
    </section>
    
</body>
</html>