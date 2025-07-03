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
    <label style="margin-right:100px">Caste</label>

    <input type="radio" name="caste" value="General" <?php if($result['caste'] == 'General') echo 'checked'; ?> required>
    <label style="margin-left:4px">General</label>

    <input type="radio" name="caste" value="OBC" <?php if($result['caste'] == 'OBC') echo 'checked'; ?>>
    <label style="margin-left:4px">OBC</label>

    <input type="radio" name="caste" value="SC" <?php if($result['caste'] == 'SC') echo 'checked'; ?>>
    <label style="margin-left:4px">SC</label>

    <input type="radio" name="caste" value="ST" <?php if($result['caste'] == 'ST') echo 'checked'; ?>>
    <label style="margin-left:4px">ST</label>
</div> <!-- ✅ This was missing -->





<div class="input-field">
    <label style="margin-right:90px" required>Language</label>

    <input type="checkbox" name="language[]" value="Bengali" >
    <label style="margin-left:4px">Bengali</label>

    <input type="checkbox" name="language[]" value="English">
    <label style="margin-left:4px">English</label>

    <input type="checkbox" name="language[]" value="Hindi">
    <label style="margin-left:4px">Hindi</label>

    <input type="checkbox" name="language[]" value="Other">
    <label style="margin-left:4px">Other</label>

    
    
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
   $caste= $_POST['caste'];
   $add= $_POST['address'];

   if($fname !="" && $lname !="" && $pass!="" &&  $conpass!="" && $gen !="" && $email !="" && $phone !="" && $caste !="" && $add!="")
   {

    $query ="UPDATE form  set fname='$fname',lname='$lname',password='$pass',conpassword='$conpass',gender='$gen',email='$email',phone='$phone', caste='$caste'address='$add' where id='$id'";
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