<?php
include("connection.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id == '') {
    echo "<script>alert('No ID provided.'); window.location.href='display.php';</script>";
    exit();
}

$query = "SELECT * FROM FORM WHERE id='$id'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
$language=$result['language'];
$language1=explode(",",$language);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP CRUD Operations</title>
</head>
<body>

<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">

    <div class="title">Update Student Details</div>

    <div class="form">

    <div class="input-field">
    <label>Current Image</label><br>
   <?php
if (!empty($result['img_stu'])) {
?>
    <input type="text" value="<?php echo $result['img_stu']; ?>" class="input" name="fname" required>
<?php
} else {
    echo "<div style='color:red;'>No image found</div>";
}
?>

</div>


<div class="input-field">
    <label>Upload New Image</label><br>
    <input type="file" name="uploadFile" style="width:100%;">
</div>


        <div class="input-field">
            <label>First Name</label>
            <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>
        </div>

        <div class="input-field">
            <label>Last Name</label>
            <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
        </div>

        <div class="input-field">
            <label>Password</label>
            <input type="password" value="<?php echo $result['password']; ?>" class="input" name="password" required>
        </div>

        <div class="input-field">
            <label>Confirm Password</label>
            <input type="password" value="<?php echo $result['conpassword']; ?>" class="input" name="conpassword" required>
        </div>

        <div class="input-field">
            <label>Gender</label>
            <select class="selectbox" name="gender" required>
                <option value="" disabled>Select</option>
                <option value="Men" <?php if ($result['gender'] == 'Men') echo 'selected'; ?>>Men</option>
                <option value="Women" <?php if ($result['gender'] == 'Women') echo 'selected'; ?>>Women</option>
            </select>
        </div>

        <div class="input-field">
            <label>Email Address</label>
            <input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" required>
        </div>

        <div class="input-field">
            <label>Phone Number</label>
            <input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone" required>
        </div>

        <div class="input-field">
            <label style="margin-right:100px">Caste</label>

            <input type="radio" name="caste" value="General" <?php if ($result['caste'] == 'General') echo 'checked'; ?> required>
            <label style="margin-left:4px">General</label>

            <input type="radio" name="caste" value="OBC" <?php if ($result['caste'] == 'OBC') echo 'checked'; ?>>
            <label style="margin-left:4px">OBC</label>

            <input type="radio" name="caste" value="SC" <?php if ($result['caste'] == 'SC') echo 'checked'; ?>>
            <label style="margin-left:4px">SC</label>

            <input type="radio" name="caste" value="ST" <?php if ($result['caste'] == 'ST') echo 'checked'; ?>>
            <label style="margin-left:4px">ST</label>
        </div>


   <div class="input-field">
    <label style="margin-right:90px" required>Language</label>


    <input type="checkbox" name="language[]" value="Bengali" 
    <?php
    if(in_array('Bengali',$language1)){
      echo "checked";
    }
    ?>
    >
    <label style="margin-left:4px">Bengali</label>


    <input type="checkbox" name="language[]" value="English"
    <?php
    if(in_array('English',$language1)){
      echo "checked";
    }
    ?>

    >
    <label style="margin-left:4px">English</label>

    <input type="checkbox" name="language[]" value="Hindi"
    
    <?php
    if(in_array('Hindi',$language1)){
      echo "checked";
    }
    ?>>
    <label style="margin-left:4px">Hindi</label>

    <input type="checkbox" name="language[]" value="Other"
    
    <?php
    if(in_array('Other',$language1)){
      echo "checked";
    }
    ?>>
    <label style="margin-left:4px">Other</label>

</div>
        
        <div class="input-field">
            <label>Address</label>
            <textarea class="textarea" name="address" required><?php echo $result['address']; ?></textarea>
        </div>

        <div class="input-field-terms">
            <div class="checkbox-wrapper">
                <label class="custom-checkbox">
                    <input type="checkbox" name="terms" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and Conditions</p>
            </div>
        </div>

        <div class="input-field">
            <input type="submit" value="Update Details" class="btn" name="update" required>
        </div>
    </div>
  </form>
</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
 
$filename=  $_FILES["uploadFile"]["name"];
$tmpfilename= $_FILES["uploadFile"]["tmp_name"];
$folder="images/".$filename;
move_uploaded_file($tmpfilename,$folder);


    // The rest of your data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['password'];
    $conpass = $_POST['conpassword'];
    $gen = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $caste = $_POST['caste'];
    $language = $_POST['language'];
    $language1 = implode(",", $language);
    $add = $_POST['address'];

    if ($fname != "" && $lname != "" && $pass != "" && $conpass != "" && $gen != "" && $email != "" && $phone != "" && $caste != "" && $language1 != "" && $add != "") {
        $query = "UPDATE form SET img_stu='$folder', fname='$fname', lname='$lname', password='$pass', conpassword='$conpass', gender='$gen', email='$email', phone='$phone', caste='$caste', language='$language1', address='$add' WHERE id='$id'";
        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "<script>alert('Data Updated Successfully');</script>";
            echo '<meta http-equiv="refresh" content="0; url=display.php">';
        } else {
            echo "<script>alert('Data Update Failed');</script>";
        }
    } else {
        echo "<script>alert('Please fill the form completely.');</script>";
    }
}

?>
