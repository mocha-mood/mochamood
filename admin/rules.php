<?php
  session_start();
  require_once '../config.php';

  if (!isset($_SESSION['adminid'])) {
    header("Location: ../loginandregister.php");
    exit;
    }
/*make it so that only admins can access this*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="admin.css">
    <title>Orders</title>
</head>
<body>

  <header>
        <div class="navbar">
            <div class="logo"><a href="barista.php">MOCHA MOOD</a></div>
            <ul class="links">
                <li><a href="barista.php">Orders</a></li>
                <li><a href="rules.php">Rules</a></li>
                <a href="logout.php" class="cart_icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </ul>
            <a href="baristaprof.php" class="action_btn">Hi! *barista name*</a>

            <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
            </div>

        </div>

        <div class="dropdown_menu">
          <li><a href="barista.php">Orders</a></li>
          <li><a href="rules.php">Rules</a></li>
          <li><a href="logout.php">Log out</a></li>
          <li><a href="baristaprof.php" class="action_btn">Profile</a></li>
        </div>

  </header>

        <script src="menutoggle.js"></script>

        <div class="flex-container">

        <div class="card">
            <div>
                <div class="text-content">
                    <h1 >Customer Service</h1> 
                    <p>Baristas should be friendly and approachable, greeting customers with a smile and a positive attitude, making every customer feel welcome. They must listen carefully to customer orders, repeating them back if necessary to ensure accuracy, and handle complaints gracefully by addressing issues calmly and offering solutions like remaking the drink or providing a refund. Maintaining cleanliness is crucial, so baristas should keep the workspace and customer areas clean and tidy at all times, wiping down counters, cleaning equipment, and tidying up spills immediately.</p>                 
                </div>
            </div>                  
        </div>

        <div class="card2">
            <div>
                <div class="text-content">
                    <h1 > Coffee Preparation</h1> 
                    <p>Baristas must follow standardized recipes exactly to ensure consistency in taste and quality across all drinks. Using fresh ingredients, checking expiration dates regularly, and measuring accurately are essential to maintaining high-quality coffee. They should also regularly clean and maintain coffee machines and grinders to ensure they function properly.</p>                 
                </div>
            </div>                  
        </div>

        <div class="card">
            <div>
                <div class="text-content">
                    <h1 >Efficiency</h1> 
                    <p>Baristas need to work quickly and efficiently, moving with purpose to reduce wait times without sacrificing quality. Orders should be handled in the order they are received, prioritizing based on the complexity of drinks when necessary. Open communication with team members is key to ensuring a smooth workflow.</p>                 
                </div>
            </div>                  
        </div>

        <div class="card2">
            <div>
                <div class="text-content">
                    <h1 >  Health and Safety</h1> 
                    <p>Good hygiene is a must, so baristas should wash their hands regularly, especially after handling money, touching their face, or using the restroom, and wear clean uniforms. They should avoid cross-contamination by being mindful of allergens and dietary restrictions, using separate equipment for different types of milk (e.g., dairy vs. non-dairy). Handling hot beverages with care to prevent burns or spills is crucial, and all local health and safety guidelines should be followed.</p>                 
                </div>
            </div>                  
        </div>

        <div class="card">
            <div>
                <div class="text-content">
                    <h1 >Professionalism</h1> 
                    <p>Baristas are expected to arrive on time for their shifts, be prepared to start work immediately, and wear the appropriate uniform while maintaining a neat appearance. Respect for coworkers is essential, and baristas should work together to create a positive environment. Honesty and accountability are important, so they should admit to mistakes, learn from them, and report any issues or concerns to a supervisor promptly.</p>                 
                </div>
            </div>                  
        </div>

        <div class="card2">
            <div>
                <div class="text-content">
                    <h1 > Continuous Improvement</h1> 
                    <p>Baristas should stay updated on menu changes, familiarize themselves with any new items, and be open to constructive criticism while seeking ways to improve their skills. Engaging in offered training sessions to improve coffee-making techniques and customer service skills is encouraged.</p>                 
                </div>
            </div>                  
        </div>

        </div>

</body>
</html>