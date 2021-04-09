<div class="col">
<div class="row" id="messageHtml"></div>
<div class="row" id='htmlGrid'>

<?php 

$children = $this->getChildren();
if (!$this->getChildren()) {
    echo "Sorry! No content.";
} else {
    foreach ($children as $key => $value) {
        print_r($children[$key]->toHtml());
    }
}

?> 

</div>    
</div>