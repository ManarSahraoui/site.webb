<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/Login&Register.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register Page </title>
    <script src="https://kit.fontawesome.com/6053bb0c2a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="box form-box">
          <?php 
          include("php\config.php");
           if(isset($_POST['Submit'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $password = $_POST['password'];

            $verify_query = mysqli_query($con, "SELECT email FROM makeup_artist WHERE email = '$email'");
            if(mysqli_num_rows($verify_query) !=0){
              echo "<div class = 'message'>
              <p>Email already exists, Try another One Please! </p>
              </div> <br>";
              echo "<a href = 'javascript:self.history.back()'> <button class ='btn'> Go Back </button> ";
            }else {
              mysqli_query($con,"INSERT INTO makeup_artist(username, email, phoneNumber, password) VALUES ('$username', '$email', '$phoneNumber', '$password')") or die ("Error Occured");
              
              echo "<div class = 'message'>
              <p> Registration Successfully! </p>
              </div> <br>";
              echo "<a href ='login.php'><button class = 'btn' > Login Now </button>";
          }
        }else {
            ?>
            <header>Sign Up</header>
             <form action="" method="post">
                <div class="field input">
                  <label for="username"> Username</label>
                  <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                  <label for="PhoneNumber">Phone Number</label>
                  <input type="tel" name="phoneNumber" id="phoneNumber"  required>
                </div>
                <div class="field input">
                  <label for="password"> Password</label>
                  <input type="password" name="password" id="password" required>
                </div>
                <div class="field ">
                  <input type="Submit" class="btn" name="Submit" value="Register" required>
                </div>
                <div class="links">
                  already a member? <a href="login.php">Sign in </a>
                </div>
             </form>
          </div>
          <?php } ?>
      </div>






</body>
</html>