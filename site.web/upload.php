<?php
include_once("php/connect.php");
if ($_POST["submit"]) {
    $fullName = $_POST["fullname"];
    $fileName = $_FILES["image"]["name"];
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempName = $_FILES["image"]["tmp_name"];
    $targetPath = "images/".$fileName;
    if(in_array($ext, $allowedTypes)){
        if(move_uploaded_file($tempName, $targetPath)){
            $query = "INSERT INTO images (post, fileName) VALUES ('$fullName', '$fileName')";
            if(mysqli_query($con, $query)){
                header("Location: home.php");
            }else{
                echo "Something is wrong";
            }
        }else{
            echo "File is not uploaded";
        }
    }else{
        echo "Your files are not allowed";
    }
}
?>

