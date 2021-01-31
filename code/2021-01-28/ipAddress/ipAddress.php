<?php
require 'ip.confic.php';
echo $ip_address;
foreach($ip_blocked as $ip){
    if($ip==$ip_address){
        die();
    }
}
?>
<h1>welcome</h1>