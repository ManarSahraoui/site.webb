<?php
session_start();
include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("LOCATION : login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/Login&Register.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Change Profile </title>
</head>
<body>
     <div class="container">
      <div class="box form-box">
        <?php
      if(isset($_POST['Submit'])){
          $username = $_POST['username'];
          $email = $_POST['email'];
          $phoneNumber = $_POST['phoneNumber'];
          $password = $_POST['password'];

          $res_Id = $_SESSION['id'];

          $edit_query = mysqli_query($con,"UPDATE makeup_artist SET username = '$username', email = '$email', phoneNumber = '$phoneNumber', password = '$password' WHERE id = '$res_Id' ") or die ("error occured");
           
          if($edit_query){
            echo "<div class = 'message'>
            <p> Profile Updated! </p>
            </div> <br>";
            echo "<a href ='home.php'><button class = 'btn' > Go Home  </button>";
          }
        }else {

            $res_Id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM makeup_artist WHERE id = '$res_Id'");

            while($result = mysqli_fetch_assoc($query)){
              $res_Uname = $result['username'];
              $res_Email = $result['email'];
              $res_Phone = $result['phoneNumber'];
            }
      
      ?>
          <header> Change Profile </header>
            <form action="" method="post">
               <div class="field input">
                 <label for="username"> Username</label>
                 <input type="text" name="username" id="username" value = "<?php echo $res_Uname; ?>"  required>
               </div>
               <div class="field input">
                 <label for="email">Email</label>
                 <input type="email" name="email" id="email" value = "<?php echo $res_Email; ?>" required>
               </div>
               <div class="field input">
                 <label for="phoneNumber">Phone Number</label>
                 <input type="tel" name="phoneNumber" id="phoneNumber" value = "<?php echo $res_Phone; ?>" required>
               </div>
               <div class="field input">
                 <label for="password">Password</label>
                 <input type="password" name="password" id="password" required>
               </div>
 
               <div class="field ">
                 <input type="Submit" class="btn" name="Submit" value="Update" required>
               </div>
            </form>
         </div>
         <?php } ?>
     </div>
</body>
</html>