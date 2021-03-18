
<?php 

$children = $this->getChildren();
foreach ($children as $key => $value) {
    print_r($children[$key]->toHtml());
}

?> 
<!-- <div id='htmlGrid'></div> -->