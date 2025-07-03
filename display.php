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
    <h2 align="center" ><mark>Displaying All Record </mark></h2>
   <center> <table border="3" cellspacing="10" width="100%" align="center" >
        <tr>
             <th width="5%"> Id</th>
            <th width="8%"> First Name</th>
            <th width="8%"> Last Name</th>
            <th width="10%"> Gender </th>
            <th width="20%"> Email Address </th>
            <th width="10%"> Phone Number </th>
            <th width="24%">Address </th>
             <th width="15%">Operations</th>
       </tr>
    <?php

   while( $result = mysqli_fetch_assoc($data)){
  
     echo "<tr>
             <td>".$result['id']."</td>
              <td>".$result['fname']."</td>
              <td>".$result['lname']." </td>
              <td>".$result['gender']." </td>
             <td> ".$result['email']. "</td>
             <td>".$result['phone']." </td>
             <td>".$result['address']." </td>
              
           <td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class=up </a></td>

        
         </tr>";
     
   }
   
} else {
    echo "No records found.";
}


?>
</table>
</center>

