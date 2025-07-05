<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background:plum;
            }
            table{
                background:white;
            }
            .up{
                background-color:green;
                color:white;
                border-radius:10px;
                border:0;
                outline:none;
                height:25px;
                width:86px;
                cursor:pointer;
                margin-bottom:10px;
            }
            .de{
                background-color:red;
                color:white;
                border-radius:10px;
                border:0;
                outline:none;
                height:25px;
                width:86px;
                cursor:pointer;

            }
       </style>
</head>
</html>

<?php 
include("connection.php");
error_reporting(0);

$query = "SELECT * FROM FORM";

$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {

    ?>
    <h2 align="center" >Displaying All Record </h2>
   <center> <table border="1" cellspacing="10" width="100%" align="center" >
        <tr>
            <th width="5%"> Id</th>
            <th width="5%"> Img</th>
            <th width="8%"> First Name</th>
            <th width="8%"> Last Name</th>
            <th width="10%"> Gender </th>
            <th width="20%"> Email Address </th>
            <th width="10%"> Phone Number </th>
            <th width="10%"> Caste </th>
            <th width="10%"> Language </th>
            <th width="24%">Address </th>
            <th width="15%">Operations</th>
       </tr>
    <?php

   while( $result = mysqli_fetch_assoc($data)){
  
     echo "<tr>
             <td style='text-align:center;'>".$result['id']."</td>
             <td style='text-align:center;'> <img src='".$result['img_stu']."' height='100px' width='100px' ></td>

              <td style='text-align:center;'>".$result['fname']."</td>
              <td style='text-align:center;'>".$result['lname']." </td>
              <td style='text-align:center;'>".$result['gender']." </td>
             <td style='text-align:center;'> ".$result['email']. "</td>
             <td style='text-align:center;'>".$result['phone']." </td>
             <td style='text-align:center;'>".$result['caste']." </td>
             <td style='text-align:center;'>".$result['language']." </td>
             <td style='text-align:center;'>".$result['address']." </td>
              
           <td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class=up  </a>
           <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class=de  onclick= 'return checkDelete()'</a></td>

        
         </tr>";
     
   }
   
} else {
    echo "No records found.";
}


?>
</table>

</center>
<script>
   function checkDelete(){
     return confirm ('Are you sure your want to delete this record?');
   }

</script>

