<?php
//assignment operator =,+=,/= etc.
$num = 'hii';
$num .= ' hello <br>';

echo $num;

//comparison operator ==,===,!=,<,> etc.
$num1 = 10;
$num2 = '10';
if($num1 === $num2){
    echo 'yes';
}else{
    echo 'no <br>';
}

//arithmetic Operators ++,--,%,+,-,/,*
$sum = 9;
echo "$sum <br>";

//logical operator &&,||,!
$a = 10;
if($a>=5 && $a<20){
    echo 'between 5 to 20';
}else{
    echo 'not in range';
}
?>
