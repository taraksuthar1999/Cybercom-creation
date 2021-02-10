<?php

  // Include database file
include 'controller/user.php';

$userObj = new User();


  // Insert Record in contact table
if (isset($_POST['register'])) {
    $userObj->registerData($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../public_html/css/create.css">
    <title>Document</title>
</head>
<body>  
    
    <div class ='content'>
        <div class="content-head-text">
        <b>Register User #</b><br>
        </div>
        <br>
        <div class = "form-container">
            <form action="register.php" method="POST">
                <table class="tab" cellpadding="20px">
                    <tr>
                       <td><label for="prefix">prefix</label></td>
                       <td><select name="prefix" id="prefix">
                       <option value="mister">Mr.</option>
                       <option value="misses">Miss.</option>
                       <option value="doctor">Dr.</option>
                       </select></td>
                    </tr>
                    <tr>
                        <td><label for="firstname">First Name</label></td>
                        <td><input class ="input" type="text" name="firstname" id="firstname"></td>
                    </tr>
                    <tr>
                        <td><label for="lastname"></label>Last Name</td>
                        <td><input class ="input" type="text" name="lastname" id="lastname"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input class ="input" type="email" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td><label for="mobilenumber">Mobile Number</label></td>
                        <td><input class ="input" type="text" name="mobilenumber" id="mobilenumber"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input class ="input" type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td><label for="confirmpassword">Confirm Password</label></td>
                        <td><input class ="input" type="password" name="confirmpassword" id="confirmpassword"></td>
                    </tr>
                    <tr>
                        <td><label for="information">Information</label></td>
                        <td><input class ="input" type="text" name="information" id="information"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class ="input" type="checkbox" name="checkbox" id="checkbox" value="true"><label for="checkbox">Hereby, I Accept Terms & Conditions</label></td>
                    </tr>
                    
                   
                </table>
                <br>
                
                <input type="submit" class="btn btn-success" name="register" value="Register">
            </form>
        </div>
        

    </div>
</body>
</html>