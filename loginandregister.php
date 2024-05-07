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
          require_once 'config.php';
          if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);

            $userquery = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password' ") or die("Error");
            $userrow = mysqli_fetch_assoc($userquery);
    

          if(is_array($userrow) && !empty($userrow)){
            $_SESSION['id'] = $userrow['id'];
            $_SESSION['username'] = $userrow['username'];
            $_SESSION['valid'] = $userrow['email'];
            header("Location: menu.php");
            exit();
         }else{
          echo "<div class='message'>
           <p>Wrong Email or Password</p>
           </div> <br>";
           echo "<a href='index.php'><button class='btn'>Try again</button>";
        
        }

        }else{
        ?>

          <form action="" class="sign-in-form" method="post">
            <h2 class="title">Log in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required />
            </div>
            <input type="submit" name="submit" value="Sign in" class="btn solid" required />
          </form>

        <?php } ?>

        <?php
require_once 'config.php';

if(isset($_POST['submit'])){

  $usernamereg = mysqli_real_escape_string($conn, $_POST['username']);
  $emailreg = mysqli_real_escape_string($conn, $_POST['email']);
  $passwordreg = mysqli_real_escape_string($conn, $_POST['password']);

  $queryreg = "INSERT INTO users (username, email, password) VALUES ('$usernamereg', '$emailreg', '$passwordreg')";
  if(mysqli_query($conn, $queryreg)){
    // Registration successful
    header("Location: loginandregister.php"); // Redirect to login page
    exit();
  } else {
    // Registration failed
    echo "Error: " . $queryreg . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
          <form action="loginandregister.php" class="sign-up-form" method="post" id="register">
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
            <input type="submit" name="submit" class="btn" value="Sign up" />
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
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
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
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