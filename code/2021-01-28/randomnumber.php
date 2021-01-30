<?php
if(isset($_POST['dice'])){
    echo rand(1,6);//we can specify the lower and upper limit like this
}
 //echo rand().' '.getrandmax();//echos random numder and the maximun number that can be generated
?>
<form action="randomnumber.php" method="POST">
    <input type="submit" name="dice" value="Roll Dice">
</form>