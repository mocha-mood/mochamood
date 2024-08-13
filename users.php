<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: loginandregister.php");
    exit;
}

$button_text = isset($_SESSION['id']) ? "Profile" : "Login";
$button_link = isset($_SESSION['id']) ? "users.php" : "loginandregister.php";
$is_logged_in = isset($_SESSION['id']);

$update_message = isset($_SESSION['update_message']) ? $_SESSION['update_message'] : '';

unset($_SESSION['update_message']);

// Fetch user details
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $date = $row['created_at'];
}
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
                <a href="checkout.html" class="cart_icon"><i class="fa-solid fa-basket-shopping"></i></a>
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

    <div class="containerprofile">
        <div class="profile">
            <div class="profile-header">
                <img src="profile.png" alt="" class="profile-img">
                <div class="profile-text-container">
                    <h1 class="profile-title">Hello <?php echo htmlspecialchars($username); ?>!</h1>
                    <p class="profile-email"><?php echo htmlspecialchars($email); ?></p>
                </div>
            </div>
                
            <div class="menu-profile">
                <a href="" class="menuprofile-link"><i class="fa-solid fa-gear menu-icon">Settings</i></a>
                <a href="" class="menuprofile-link"><i class="fa-solid fa-mug-saucer menu-icon">Orders</i></a>
                <a href="logout.php" class="menuprofile-link"><i class="fa-solid fa-right-from-bracket menu-icon">Logout</i></a>
            </div>
        </div>

        <form id="account-profile-form" class="account-profile" action="updateusers.php" method="post">
            <div class="account-profile-header">
                <h1 class="account-title">Account Setting</h1>
                <div class="btn-container-profile">
                    <button type="button" class="btn-cancel-prof">Cancel</button>
                    <button type="button" class="btn-save-prof" onclick="document.getElementById('account-profile-form').submit();">Save</button>
                </div>
            </div>

            <div class="account-edit">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <div class="input-containerprof">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                </div>

                <div class="input-containerprof">
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>

                <div class="input-containerprof">
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>" required>
                </div>

                <div class="input-containerprof">
                    <label>Account made</label>
                    <p class="profile-email"><?php echo htmlspecialchars($date); ?></p>
                </div>
            </div>
        </form>
    </div>

    <h2 class="section-title">Your Orders</h2>
    <div class="order-container">
    <?php
    // Fetch user orders
    $query = "SELECT * FROM orders WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows > 0) {
            while ($roworders = $result->fetch_assoc()) {
                $orderdetails = $roworders['order_details'];
                $orderdate = $roworders['order_date'];
                $totalamount = $roworders['total_amount'];
                $status = $roworders['status'];
                ?>
                <div class="order-item">
                    <div class="order-details">
                        <label class="order-label">Order:</label>
                        <p class="order-info"><?php echo htmlspecialchars($orderdetails); ?></p>
                    </div>
                    <div class="order-details">
                        <label class="order-label">Date:</label>
                        <p class="order-info"><?php echo htmlspecialchars($orderdate); ?></p>
                    </div>
                    <div class="order-details">
                        <label class="order-label">Total:</label>
                        <p class="order-info"><?php echo htmlspecialchars($totalamount); ?></p>
                    </div>
                    <div class="order-details">
                        <label class="order-label">Status:</label>
                        <p class="order-info"><?php echo htmlspecialchars($status); ?></p>
                    </div>
                </div>
                <?php
            }
        } else {
            // No orders found
            echo "<p>Uh oh! No orders have been made yet</p>";
        }
    } else {
        echo "Error fetching orders: " . $stmt->error;
    }
    ?>
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

    <?php if ($update_message): ?>
    <script>
        alert("<?php echo $update_message; ?>");
    </script>
    <?php endif; ?>
    
</body>
</html>
