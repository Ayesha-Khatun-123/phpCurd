<?php
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadFile"><br> <br>
        <input type="submit" name="submit" value="upload File">
</form>
    
</body>
</html>

<?php


$filename=  $_FILES["uploadFile"]["name"];
$tmpfilename= $_FILES["uploadFile"]["tmp_name"];
$folder="images/".$filename;
//echo $folder;
move_uploaded_file($tmpfilename,$folder);

 //print_r($_FILES["uploadFile"]);
 echo "<img src='$folder' height='100px' width='100px'>";

?>

 