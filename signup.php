<?php
include "dbconnect.php";
if (isset($_REQUEST['signup'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('".$username."', '" . md5($password) . "', '".$email."', '".$create_datetime."')";
    $result   = mysqli_query($conn, $query);
    if ($result) {
        echo "<div class='form'>
              <h3>You are registered successfully.</h3><br/>
              <p class='link'>Click here to <a href='login.php'>Login</a></p>
              </div>";
    } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='signup.php'>Signup</a> again.</p>
              </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body style="display:flex;">
  <div class="container">
    <div class="forms">
      <div class="form-content">
        <div class="signup-form">
          <div class="title">Signup</div>
          <form action="" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter user name" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter user email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter user password" name="password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="signup" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <a href="login.php">Login now</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
