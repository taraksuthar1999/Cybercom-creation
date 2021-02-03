<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="validation.js"></script>
    <style>
        form{
            margin:auto;
            
        }
        table{
            padding:5px;
            margin:auto;
            width:50%;
            
        }
        td{
            padding:5px;
            margin:0;
            background-color:#48D0FA;
        }
        .input{
            width:95%;
        }
        .button{
            width:30%;
            padding:10px;
            
        }
        textarea{
            width:95%;
        }
        span{
            color:red;
        }
        .output{
            padding:5px;
            margin:auto;
            width:50%;
            border:1px solid black;
        }
    </style>
</head>
<body>
   
    <form action="practiceform1.php" method="POST" enctype="multipart/form-data"> 
        <table border="1px" >
            <tr>
                <th colspan="2" style="background-color:#ECFA25;"><h1 style="color:red;">User Form</h1></th>
            </tr>
            <tr>
                <td>Enter Name</td>
                <td><input type="text" class="input" id="name" name="name" onfocusout="validate(id)"><br> <span id="nameErr" style="display:none;">* please enter the value.</span>
                </td>
            </tr>
            <tr>
                <td>Enter Password</td>
                <td><input type="password" class="input" id="password" name="password" onfocusout="validate(id)"><br> <span id="passwordErr" style="display:none;">* please enter the value.</span>
                </td>
            </tr>
            <tr>
                <td>Enter Address</td>
                <td><textarea id="address" class="input" name="address" onfocusout="validate(id)"  cols="30" rows="3"></textarea><br> <span id="addressErr" style="display:none;">* please enter the value.</span>
                </td>
            </tr>
            <tr>
                <td>Select Game</td>
                <td><input type="checkbox"  id="hockey" name="checkbox[]" value="hockey" ><label for="hockey">Hockey</label><br>
                    <input type="checkbox"  id="football" name="checkbox[]" value="football" ><label for="football">Football</label><br>
                    <input type="checkbox"  id="badminton" name="checkbox[]" value="badminton" ><label for="badminton">Badminton</label><br>
                    <input type="checkbox"  id="cricket" name="checkbox[]" value="cricket" ><label for="cricket">Cricket</label><br>
                    <input type="checkbox"  id="vollyball" name="checkbox[]" value="volleyball" ><label for="vollyball">Vollyball</label><br>
                    <span id="checkboxErr" style="display:none;">* please check atleast one.</span>
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender[]" id="male" value="male" ><label for="gender">Male</label><input type="radio" name="gender[]" id="female" value="female" ><label for="gender">Female</label><br>
                    <span id="genderErr" style="display:none;">* please check atleast one.</span></td>
            </tr>
            <tr>
                <td>Select Age</td>
                <td><select name="age" id="age" class="input">
                    <option value="">Select your age</option>
                    <option value="18">18</option>
                    <option value="18">19</option>
                    <option value="18">20</option>
                    <option value="18">21</option>
                    <option value="22">21+</option>
                </select><br>
                <span id="ageErr" style="display:none;">* please select your age.</span></td>
                </td>
            </tr>
            <tr>
                <td style="text-align:center;" colspan="2">
                <input type="file" name="file" id="file"><br>
                <span id="fileErr" style="display:none;">* please upload file</span>
                </td>
            </tr>
            <tr>
                
                <td style="text-align:center;" colspan="2"><input type="reset" class="button" value="Reset"> <input type="submit" class="button" id="submit" value="Submit" onclick="return onSubmit()"></td>
            </tr>

        </table>
       
    </form>
    <br>
    <div class="output">
        <h1>Output</h1>
        <?php
           
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                
                //////////database connection///////
                if(!$conn = mysqli_connect('localhost','root','','phppractice')){
                    die('could not connect');
                }
               //////////////////////////////////////
                $name = htmlentities($_POST['name']);
                $password = htmlentities($_POST['password']);
                $address = htmlentities($_POST['address']);
                $checkbox = $_POST['checkbox'];
                $gamestring = htmlentities(implode(',', $checkbox));
                $gender = $_POST['gender'];
                $genderstring =htmlentities(implode(',',$gender));
                $file = $_FILES['file']['name'];

                $age = (int) htmlentities($_POST['age']);
                if(!empty($name)){
                    echo '<br>Name: '.$name.'<br>';
                }
                if(!empty($password)){
                    echo 'Password: '.$password.'<br>';
                }
                if(!empty($address)){
                    echo 'Address: '.$address.'<br>';
                }
                
                echo 'Games: '.$gamestring;
              /*  foreach($checkbox as $game){
                    echo  htmlentities($game).' ';
                }*/
               
                echo '<br>Gender: '.$genderstring;
                /*foreach($gender as $x){
                    echo  htmlentities($x).' ';
                }*/
                if(!empty($age)){
                    echo '<br>Age: '.$age;
                }
                echo '<br>File Name: '.$file;

                //////////////////file upload//////////////
                $target = '/projects/Cybercom-creation/code/2021-02-01/practiceform1/uploads/';
                $target = $_SERVER['DOCUMENT_ROOT'].$target.basename($_FILES['file']['name']);
                if(move_uploaded_file($_FILES['file']['tmp_name'], $target)) 
                { 
                    echo '<br>file uploaded<br>';
                    //Tells you if its all ok 
                    //echo "The file ". basename( $_FILES['uploaded_file']['name']). " has been uploaded, and your information has been added to the directory"; 
                } 
                else 
                { 
                    //Gives and error if its not 
                    //echo "Sorry, there was a problem uploading your file."; 
                } 

                ////////////database entery////////////////
               
               $input_name= mysqli_real_escape_string($conn, $name);
               $input_password= mysqli_real_escape_string($conn, $password);
               $input_address= mysqli_real_escape_string($conn, $address);
               $input_game= mysqli_real_escape_string($conn, $gamestring);
               $input_gender= mysqli_real_escape_string($conn, $genderstring);
               $input_age= mysqli_real_escape_string($conn, $age);
               $input_file= mysqli_real_escape_string($conn, $file);
               $query = "INSERT INTO form1 (name,password,address,game,gender,age,file_name) VALUES ('$input_name','$input_password','$input_address','$input_game','$input_gender','$input_age','$input_file')";
                if($query_run = mysqli_query($conn,$query)){
                    echo 'Query success';
                }else{
                    echo 'Query failed';
                }


            }
        ?>
    </div>
</body>
</html>