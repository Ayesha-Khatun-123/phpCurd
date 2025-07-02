<?php
 //error_reporting(0); eta error hole warning take show korab ena only dekhabe connaction failed
$servername= "localhost";
$username="root";
$password="Ayesha@2003";
$dbname ="responsiveform";
$conn = mysqli_connect($servername,$username,$password,$dbname );

 if($conn){
    //echo " Connection Establish";

 }
 else{
    echo " Connection Failed"; 
    
 }

?>
