<?php
//preg_match();for expresion matching,pattern checking in strings
$string = 'this is the string';
if(preg_match('/this /',$string)){
    echo 'match found';
}else{
    echo 'not found';
}
?>