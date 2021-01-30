<?php
$redirect_page = 'http://google.co.in';
$redirect = true;
if($redirect)header('Location: '.$redirect_page);//it modifies the header if it is used after the data is outputted on page then it can not modify the header
?>