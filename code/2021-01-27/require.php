<?php
require 'header.php';//here if the file is not valid it will show error and will stop the the execution
require_once 'header.php';//it will check if the file is required before if it is then it wont require it again if not then will require it
/*if(defined('header.php')){// same as require_once
    require 'header.php';
}*/
echo '<p>hey the header is required on top of me</p>';
echo '<br>'.$var; //calling the value which is defined in header.php file
?>