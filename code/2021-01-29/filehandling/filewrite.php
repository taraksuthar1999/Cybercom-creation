<?php
$handle = fopen('name.txt','w');//fopen can create the file if it doesnot exist
fwrite($handle,'welcome'."\n");//to write data in the file
fwrite($handle, 'tarak'."\n");
$handle1 = fopen('name.txt','a');// a stands for append it adds the data to the existing data in the file
fwrite($handle1,'don');
fclose($handle);
fclose($handle1);
echo 'written';
?>