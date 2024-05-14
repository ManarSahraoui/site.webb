<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style\client.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Client Page</title>
    <script src="https://kit.fontawesome.com/6053bb0c2a.js" crossorigin="anonymous"></script>
</head>
<body>
    <img src="images/newlogo.png" class="logooo">
       <div class="search-box">
        <div class="row">
           
             <form method="post">
            <input type="text" id="input-box" placeholder="Search..." name="query">
         <!-- <button> <i class="fa-solid fa-magnifying-glass" name="submit"></i> </button> -->
         <input type="submit" name = "submit">
            
            </form>
        </div>

       </div>
       <?php
        $con = new PDO ("mysql:host=localhost;dbname=site.web",'root','');
       if(isset($_POST['submit'])){
    $str = $_POST['query'];
    $sth  = $con ->prepare("SELECT * FROM makeup_artist WHERE username = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth->execute();
    
    if( $row=$sth->fetch()){
        ?>
         <div class="container">
        <div class="box form-box">
          <header> Makeup Artist  </header>
          <p><?php echo $row->username;?></p>
    </div>

</div>
<?php
    }
   
    else{
        echo "name does not exist";
    }


}?>

       
</body>
</html>
    



