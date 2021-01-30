<?php
$time = time();
$actual_time = date('d M Y @ H:i:s', $time);//here time returns the seconds from 1970 and date converts this time to readable time here date accepts to argument one for representation and second for time
$modified_time = date('d M Y @ H:i:s',strtotime('+1 year'));//here strtime returns the actual time + time specified in arguments
echo 'the time now '.$actual_time.'<br>the time modified '.$modified_time;
?>