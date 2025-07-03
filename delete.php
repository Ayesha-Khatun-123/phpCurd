<?php
include("connection.php");
$id=isset($_GET['id'])?$_GET['id']:'';
if($id==''){
    echo "<script>alert('No id provided'); window.location.href='display.php';</script>";
}

 $query= "Delete from form  where id ='$id'";
 $data=mysqli_query($conn,$query);

 if($data){
    echo "<script>alert('Data Deleted Succesfully')</script>";
    ?>
     <meta http-equiv = "refresh" content = "0; url = http://localhost/PhpCurd/display.php" />

    <?php

 }
 else{
    echo "Failed";
 }

?>