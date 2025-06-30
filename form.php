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

        <div class="title">
            Registration Form
        </div>
 
        <div class="form">
        <div class="input-field">
           <label> First Name </label>
           <input type="text" class="input">
        </div>
   
       <div class="input-field">
           <label> Last Name </label>
           <input type="text" class="input">
        </div>

       

        <div class="input-field">
           <label> Password </label>
           <input type="password" class="input">
        </div>

        <div class="input-field">
           <label> Confirm Password </label>
           <input type="password" class="input">
        </div>

         <div class="input-field">
            <label> Gender</label>

            <Select class="selectbox">
                <Option>Select</Option>
                <Option>Men</Option>
                <Option>Women</Option>
            </Select>
           
        </div>

        <div class="input-field">
           <label> Email Address</label>
           <input type="text" class="input">
        </div>

        <div class="input-field">
           <label> Phone Number</label>
           <input type="text" class="input">
        </div>

         <div class="input-field">
           <label> Address </label>
          <textarea class="textarea"></textarea>
        </div>
      
 <div class="input-field-terms">
  <div class="checkbox-wrapper">
    <label class="custom-checkbox">
      <input type="checkbox" >
      <span class="checkmark"></span>
    </label>
    <p>Agree to terms and Conditions</p>
  </div>
</div>


  <div class="input-field">
    <input type="submit" value="Register" class="btn">
  </div>
</div>


</div>
</div>
    
</body>
</html>