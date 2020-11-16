<?php 
//ini untuk mengkoneksikan ke database
// $server = "localhost";
// $user = "root";
// $passw = "";
// $db = "db_simpeg";
 $conn = mysqli_connect("localhost","root","","db_simpeg"); 
// $conn = mysqli_connect($server, $user, $passw, $db);

if(!$conn){
    echo "Failed Connection";
} 
?>