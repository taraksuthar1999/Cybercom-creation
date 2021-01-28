<?php

function abc($day,$date,$month){
    echo "$day $date $month";
} 
abc('monday',13,'february <br>');//function with arguments

//function with return value and fun as argument
function add($num1,$num2){
    return $num1+$num2;
}
function divide($n,$d){
  
    return $n/$d;
}
$sum = divide(add(10,10),add(5,5));
echo $sum;

?>