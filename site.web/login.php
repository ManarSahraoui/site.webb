<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/Login&Register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        <?php 
        include("php/config.php");
        if(isset($_POST['Submit'])){
          $email = mysqli_real_escape_string($con,$_POST['email']);
          $username = mysqli_real_escape_string($con,$_POST['username']);
          $password = mysqli_real_escape_string($con,$_POST['password']);

          $result = mysqli_query($con,"SELECT * FROM makeup_artist WHERE email= '$email' AND password = '$password' AND username='$username'")or die("Select Error");
          $row = mysqli_fetch_assoc($result);
          if(is_array($row) && !empty($row)){
            $_SESSION['valid'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['phoneNumber'] = $row['phoneNumber'];
          }else {
            echo "<div class = 'message'>
          <p> Wrong User_name or Password </p>
          </div> <br>";

          echo "<a href ='login.php'><button class = 'btn' >Go Back</button>";  
          }
          if(isset($_SESSION['valid'])){
             header("LOCATION: home.php");
          }
        }else{
          ?>
             <header>login</header>
             <form action="" method="post">
             <div class="field input">
                  <label for="email"> Email</label>
                  <input type="email" name="email" id="email" required>
                </div>
             <div class="field input">
                  <label for="username"> Username</label>
                  <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                  <label for="password"> Password</label>
                  <input type="password" name="password" id="password" required>
                </div>
                <div class="field ">
                  <input type="Submit" class="btn" name="Submit" value="login" required>
                </div>
                <div class="links">
                  Don't Have Account? <a href="register.php">Sign Up Now </a>
                </div>
             </form>
          </div>

          <?php } ?>
          
      </div>
      <a href="site.php">
        <div class="arrow">
      <div class="arr left"> <div></div> </div>
      </div>
        
    </a>
      
</body>
</html>