<?php
$car = array('primium'=>array('audi','mercedes'),'nonprimium'=>array('maruti','honda'));

foreach($car as $element => $inner_array){
    echo '<strong>'.$element.'</strong><br>';
    foreach($inner_array as $item){
        echo $item.'<br>';
    }
}
?>