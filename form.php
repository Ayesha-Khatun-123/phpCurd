<?php include("connection.php")
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
            Registration Form
        </div>
 
        <div class="form">
        <div class="input-field">
           <label> First Name </label>
           <input type="text" class="input" name="fname" required>
        </div>
   
       <div class="input-field">
           <label> Last Name </label>
           <input type="text" class="input" name="lname" required>
        </div>

       

        <div class="input-field">
           <label> Password </label>
           <input type="password" class="input" name="password" required>
        </div>

        <div class="input-field">
           <label> Confirm Password </label>
           <input type="password" class="input" name="conpassword" required>
        </div>

         <div class="input-field">
  <label>Gender</label>
  <select class="selectbox" name="gender" required>
    <option value="" disabled selected>Select</option>
    <option value="Men">Men</option>
    <option value="Women">Women</option>
  </select>
</div>


        <div class="input-field">
           <label> Email Address</label>
           <input type="text" class="input" name="email" required>
        </div>

        <div class="input-field">
           <label> Phone Number</label>
           <input type="text" class="input" name="phone" maxlength="10" required>
        </div>

         <div class="input-field">
           <label> Address </label>
          <textarea class="textarea" name="address"></textarea required>
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
    <input type="submit" value="Register" class="btn" name="Register"required>
  </div>
</div>


</div>
</form>
</div>
    
</body>
</html>

<?php
if(isset($_POST['Register'])){
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

     $query ="INSERT INTO form VALUES('$fname','$lname','$pass','$conpass','$gen','$email','$phone','$add')";
    $data =  mysqli_query($conn ,$query);

    if($data){
      echo "Data Inserted Succesfully";
    }
    else{
      "Data Cannot Inserted";
    }
   }
   else{
      echo "<script> alert('Please Fill the Form');</script>";
   }
}

?>