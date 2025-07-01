<?php
$servername= "localhost";
$username="root";
$password="Ayesha@2003";
$dbname ="responsiveform";
 $conn = mysqli_connect($servername,$username,$password,$dbname );
 if($conn){
    echo "Connection Ok";

 }
 else{
    echo "Cannot Connect";
 }
?>
