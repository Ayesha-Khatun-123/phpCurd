<?php include("connection.php");
//$id=$_GET['id'];
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id == '') {
    echo "<script>alert('No ID provided.'); window.location.href='display.php';</script>";
    exit();
}

$query = "SELECT * FROM FORM where id='$id'";

$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Php Curd Opearations</title>
</head>
<body>

    <div class="container">
      <form  action="" method="POST">

        <div class="title">
            Update Student Details
        </div>
 
        <div class="form">
        <div class="input-field">
           <label> First Name </label>
           <input type="text" value="<?php echo $result['fname'];?>" class="input" name="fname" required>
        </div>
   
       <div class="input-field">
           <label> Last Name </label>
           <input type="text" value="<?php echo $result['lname'];?>" class="input" name="lname" required>
        </div>

       

        <div class="input-field">
           <label> Password </label>
           <input type="password"  value="<?php echo $result['password'];?>" class="input" name="password" required>
        </div>

        <div class="input-field">
           <label> Confirm Password </label>
           <input type="password" value="<?php echo $result['conpassword'];?>"class="input" name="conpassword" required>
        </div>

         <div class="input-field">
  <label>Gender</label>
  <select class="selectbox" name="gender" required>
    <option value="" disabled selected>Select</option>
    <option value="Men"
    <?php 
     if($result['gender'] == 'Men'){
         echo 'selected';
     }
    ?>
    >Men</option>

    <option value="Women"

    <?php 
     if($result['gender'] == 'Women'){
         echo 'selected';
     }
    ?>
    
    >Women</option>
  </select>
</div>


        <div class="input-field">
           <label> Email Address</label>
           <input type="text"value="<?php echo $result['email'];?>" class="input" name="email" required>
        </div>

        <div class="input-field">
           <label> Phone Number</label>
           <input type="text" value="<?php echo $result['phone'];?>" class="input"value="<?php echo $result['email'];?>" name="phone" maxlength="10" required>
        </div>

         <div class="input-field">
           <label> Address </label>
          <textarea class="textarea" name="address" required>
          <?php
          echo  $result['address'];?>
          
        
        </textarea>
        </div>
      
 <div class="input-field-terms">
  <div class="checkbox-wrapper">
    <label class="custom-checkbox">
      <input type="checkbox"  required>
      <span class="checkmark"></span>
    </label>
    <p>Agree to terms and Conditions</p>
  </div>
</div>


  <div class="input-field">
    <input type="submit" value="Update Details" class="btn" name="update"required>
  </div>
</div>


</div>
</form>
</div>
    
</body>
</html>

<?php
if(isset($_POST['update'])){
   $fname= $_POST['fname'];
   $lname= $_POST['lname'];
   $pass= $_POST['password'];
   $conpass= $_POST['conpassword'];
   $gen= $_POST['gender'];
   $email= $_POST['email'];
   $phone= $_POST['phone'];
   $add= $_POST['address'];

   if($fname !="" && $lname !="" && $pass!="" &&  $conpass!="" && $gen !="" && $email !="" && $phone !="" && $add!="")
   {

    $query ="UPDATE form  set fname='$fname',lname='$lname',password='$pass',conpassword='$conpass',gender='$gen',email='$email',phone='$phone',address='$add' where id='$id'";
    $data =  mysqli_query($conn ,$query);

    if($data){
      echo "<script>alert('Data Updated Succesfully')</script>";
      ?>
      <meta http-equiv = "refresh" content = "0; url = http://localhost/PhpCurd/display.php" />

      <?php
    }
    else{
      "Data Cannot Updated";
    }
   }
   else{
      echo "<script> alert('Please Fill the Form');</script>";
   }
}

?>