<?php
$find = array('is','string', 'rifle');
$replace = array('IS','STRING','omkara');
$str = 'this is a ring, and is an example';
$newstr=str_replace($find,$replace,$str);// now this will replace the $find values to $replace values from str 
echo $newstr;
?>