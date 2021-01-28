<?php
$user_ip = $_SERVER['REMOTE_ADDR'];
//echo $string = $user_ip;
function userIp(){
    global $user_ip;
    echo 'ip is '.$user_ip;
}
userIp();

?>