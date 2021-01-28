<?php
/*$string = 'Hey Buddy Whats Upp';
echo strtolower($string).'<br>';
echo strtoupper($string);*/
if(isset($_GET['user_name'])&&!empty($_GET['user_name'])){
    $user_name = $_GET['user_name'];
    if(strtolower($user_name)=='tarak'){
        echo 'you are amazing, '.$user_name;
    }
}
?>
<form action="strtolow_upp.php" method="GET">
    Name: <input type="text" name="user_name"><br><br>
    <input type="submit" value="Submit">
</form>