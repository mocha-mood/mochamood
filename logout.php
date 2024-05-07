<?php
    session_start();

    if(isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        session_destroy();
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Logout</title>
</head>
<body>
    <script>
        function confirmLogout() {
            var confirmLogout = confirm("Are you sure you want to log out?");
            if (confirmLogout) {
                window.location.href = "logout.php?confirm=true";
            } else {
                window.location.href = "http://tietokanta.dy.fi:8000/mochamood/index.php";
            }
        }

        window.onload = confirmLogout;
    </script>
</body>
</html>
