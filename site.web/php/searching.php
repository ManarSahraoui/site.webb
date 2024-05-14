<?php>

$con = new PDO ("mysql:host=localhost:3306;dbname=site.web",'root','');

if(isset($_POST['submit'])){
    $str = $_POST['query'];
    $sth  = $con ->prepare("SELECT * FROM makeup_artist WHERE username = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth->execute();

    if($row=$sth->fetch()){
     header("LOCATION : search.php");
    }
   
    else{
        echo "name does not exist";
    }


}?>
