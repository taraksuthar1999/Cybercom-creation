<?php
$find = 'is';
$offset =0;
$string = 'this is a string, and it is an example';
while ($str_pos= strpos($string,$find,$offset)){
    echo $find.' found at '.$str_pos.'<br>';
    $offset = $str_pos + strlen($find);
}
?>