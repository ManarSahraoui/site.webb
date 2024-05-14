<?php 
session_start();
include_once("php/config.php");
if(!isset($_SESSION['valid'])){
  header("LOCATION : login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://kit.fontawesome.com/6053bb0c2a.js" crossorigin="anonymous"></script>
</head>
<body>
    <img src="images/newlogo.png" class="logooo">
    <div class="search-box">
        <div class="row">
           

            <input type="text" id="input-box" placeholder="Search..." name="query">
            <button> <i class="fa-solid fa-magnifying-glass" name="submit"></i> </button>
        </div>

       </div>
    
          <div class="right-links">
          <div class="nave">
            <?php
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT * FROM makeup_artist WHERE id='$id'");
             
             while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['username'];
                $res_Email = $result['email'];
                $res_Phone = $result['phoneNumber'];
                $res_id = $result['id'];
             }
             
             echo"<a href='edit.php?id=$id'> Change Profile </a>"; 
               ?>
             </div>
            <div class="navee">
            <a href="php/logout.php"> <button class="btn"> Log Out </button></a>
          </div>
 </div>

<!-- ...............................Start Main Section..................................-->
<main>
 <div class="container">
  <!-- ............................Left...............................-->
    <div class="left">
      <!-- ..........Profile........-->
        <a class="profile">
          <div class="handle">
            <h4>Manar Sahraoui</h4>
             <p class="text-gry">
             <p>@ <?php echo $res_Uname;?></p>
             </p>
          </div>
        </a>
      <!--...........Start Aside Bar.........-->
       <div class="sidebar">
         <a class="menu-item active">
          <span><i class="fa-solid fa-house"></i></span><h3>Home</h3>
         </a>
         <a class="menu-item" >
          <span><i class="fa-solid fa-bell"><small class="notification-count">+9</small></i></span><h3>Notifications</h3>
                        
         </a>
       </div>
      <!--...........End Aside Bar...........-->
    </div>
    
  <!-- ............................Middle...............................-->
    <div class="middle">
    <div class="container mt-5">
        <div class="image-container">
    <?php
    include_once("php/connect.php");
    $query = "SELECT * FROM images";
    $result = mysqli_query($con, $query);
    echo "<a class='btn btn-info mb-4' href='create.php'>Add New</a>";
    if ($result->num_rows>0) {
        while($row = mysqli_fetch_array($result)){
            $name = $row["post"];
            $fileName = $row["fileName"];
            $imageUrl = "images/".$fileName;
            echo "<div class='profile mt-4'>";
            echo "<img src='$imageUrl'>";
            echo "<h3>$name</h3>";
            echo "</div>";
        }
    }
    ?>
    </div>
    </div>
  </div>
  <!-- ............................Right...............................-->
    <div class="main-right"></div>
 </div>
</main>
<!-- ...............................start Main Section..................................-->




</body>
</html>