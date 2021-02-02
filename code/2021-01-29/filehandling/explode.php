<?php
$filename = 'name1.txt';
$handle = fopen($filename,'r');
echo fread($handle,filesize($filename));//fread is used to read the data from the file it accepts two arguments filename and number of characters.
$names_array = explode(',','alex, billy, dale');// explode is used to split the data ex. here data is splited by ',' here we can also pass fread as an argument;
foreach($names_array as $name){
    echo $name.' ';
}

?>