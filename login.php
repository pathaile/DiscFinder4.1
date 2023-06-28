<?php
    require('dbconnect.php');
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
          $_SESSION['username'] = $username;
          $_SESSION['userid'] = $row['id'];
          // Redirect to user dashboard page
          header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body style="display:flex">
  <div class="container">
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">User Login</div>
          <form action="" method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter user name" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter user password" name="password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="signup.php">Sigup now</a></div>
            </div>
        </form>
      </div>
        
    </div>
    </div>
  </div>
</body>
</html>
