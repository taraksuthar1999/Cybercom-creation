<?php
function hasSpace($string){
    if(preg_match('/ /',$string)){
        echo 'has at least one space';

    }else{
        echo 'no space found';

    }
}
hasSpace('abxdfj ksjffs');
?>