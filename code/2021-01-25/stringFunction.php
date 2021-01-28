<?php
//str_word_count function can take three argument
$string = 'thid is a example string ?';
$string_word_count = str_word_count($string,1,'?');// second argument 0 then returns integer if 1 then returns array you can also give 2 in argument
//print_r( $string_word_count);
///////////////////////////////////////////////
//str_shuffle function only one argument
$string_shuffled = str_shuffle($string);

$half = substr($string_shuffled,0,strlen($string_shuffled)/2);//can return specific substring
//echo $half.'<br>';
$rev = strrev($half);//to reverse the string
//echo $rev;
////////////////////////////////////////////////
//comapare percentage similarity between two strings
$str1='hii this is something intersting have a look at this';
$str2 ="hii this is something cool have a quick look";
similar_text($str1,$str2,$result);
//echo $result;//result stores the percentage value
////////////////////////////////////////////////
//different string functions
$str = ' this <img src="eg.jpg"> is EZ ';
echo trim($str);// removes the white space
echo htmlentities(addslashes($str));//adds slashes in html code
?>