<?php

session_start();


if(isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="logsign.css" />
    <title>Login in & Register</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

        <?php
        /* Login Function*/
          require_once 'config.php';
          if(isset($_POST['login_submit'])){
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);

            $userquery = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password' ") or die("Error");
            $userrow = mysqli_fetch_assoc($userquery);
    
          /*Admin Login */
          if (!is_array($userrow) || empty($userrow)) {
            $adminquery = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'") or die("Error");
            $adminrow = mysqli_fetch_assoc($adminquery);


            if (is_array($adminrow) && !empty($adminrow)) {
                $_SESSION['id'] = $adminrow['id'];
                $_SESSION['username'] = $adminrow['username'];
                $_SESSION['valid'] = $adminrow['email'];
                header("Location:admin/barista.php"); 
                exit();
            }
          }

          /*Customer Login */

          if(is_array($userrow) && !empty($userrow)){
            $_SESSION['id'] = $userrow['id'];
            $_SESSION['username'] = $userrow['username'];
            $_SESSION['valid'] = $userrow['email'];
            header("Location: index.php");
            exit();
         }else{
          echo "<div class='message' >
          <p>Wrong Email or Password. 
          <a href='loginandregister.php' class='try-again-link'>Try again</a>
          </p>
         </div>";
        }

        }else{
        ?>

          <form action="loginandregister.php" class="sign-in-form" method="post" id="login">
            <h2 class="title">Log in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required />
            </div>
            <input type="submit" name="login_submit" value="Submit" class="btn solid" required />
          </form>

        <?php } ?>

        <?php
        /* Register Function*/
require_once 'config.php';

if(isset($_POST['register_submit'])){

  $usernamereg = mysqli_real_escape_string($conn, $_POST['username']);
  $emailreg = mysqli_real_escape_string($conn, $_POST['email']);
  $passwordreg = mysqli_real_escape_string($conn, $_POST['password']);

  $queryreg = "INSERT INTO users (username, email, password) VALUES ('$usernamereg', '$emailreg', '$passwordreg')";
  if(mysqli_query($conn, $queryreg)){
    header("Location: loginandregister.php"); 
    exit();
  } else {
    echo "Error: " . $queryreg . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
          <form action="" class="sign-up-form" method="post" id="register">
            <h2 class="title">Register</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <input type="submit" name="register_submit" class="btn" value="Submit" />
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              No account? No problem! Sign up is free and easy to do by pressing the button bellow!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="coffeeandfriends.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Are you already part of the coffee club? Just sign in and you're set!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="barista.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="logsignforum.js"></script>
  </body>
</html>