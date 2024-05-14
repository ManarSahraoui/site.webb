<?php
$dbHost = "localhost:3306";
$dbUser ="root";
$dbPass ="";
$dbName = "site.web";

$con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if (!$con){
    die("something went wrong");
} 