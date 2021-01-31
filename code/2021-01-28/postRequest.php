<?php

$match = 'pass123';
if(isset($_POST['password'])){
    $password = $_POST['password'];
    if(!empty($_POST['password'])){
        $password = $_POST['password'];
    if($password == $match){
        echo 'correct ';
    }else{
        echo 'sorry incorrect password';
    }
}
}

?>
<form action="postRequest.php" method="POST">
    Password: <br>
    <input type="password" name="password" id=""><br><br>
    <input type="submit" value="Submit">
</form>