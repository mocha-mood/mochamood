<?php
  session_start();
  require_once '../config.php';

  if (!isset($_SESSION['id'])) {
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

      <div class="containertime">
    <div class="time">
        <div class="hms"></div>
        <div class="date"></div>
    </div>

    <script>
        function updateTime() {
            var dateInfo = new Date();

            var hr = (dateInfo.getHours() < 10) ? "0" + dateInfo.getHours() : dateInfo.getHours(),
                min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
                sec = (dateInfo.getSeconds() < 10) ? "0" + dateInfo.getSeconds() : dateInfo.getSeconds();

            var currentTime = hr + ":" + min + ":" + sec;
            document.getElementsByClassName("hms")[0].innerHTML = currentTime;

            var dow = [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday"
                ],
                month = [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                day = dateInfo.getDate();

            var currentDate = dow[dateInfo.getDay()] + ", " + month[dateInfo.getMonth()] + " " + day;
            document.getElementsByClassName("date")[0].innerHTML = currentDate;
        }

        updateTime();
        setInterval(updateTime, 1000);
    </script>
</div>

      <div class="containcolumn">

            <div id="inprog">
              <h3>In Progress</h3>
            </div>

            <div id="ready">
              <h3>Ready</h3>
            </div>

            <div id="received">
              <h3>Received</h3>
            </div>

      </div>

      
</body>
</html>