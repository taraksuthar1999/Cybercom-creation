<?php
$Category = $this->getCategory();
$dropdown = $this->getCategoryOptions();


//echo '<pre>';
//print_r($dropdown->getData());



?>


<br>
<?php /*<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save', 'category', ['id' => $Category->id]) ?>" method="POST">*/ ?>
  
    
    <table class="table">
    <tr><td><label for="status">Parent</label></td>
    <td>
        <select name="category[parentId]" id="status">
       
            <?php 
           // $statusOption = $Category->getCategoryOptions();

            foreach ($dropdown as $id => $name) {
                ?>
                <option value="<?php echo $id ?>" <?php //if ($value->id == $Category->parentId) echo 'selected' ?>><?php echo $name ?></option>
            <?php

        }
        ?>
            
            
        </select></td>
    </tr>
 
    <tr>
    <td><label for="name">Name</label></td>
    <td><input type="text" id="name" name="category[name]" value="<?php echo $Category->name ?>"></td>
    </tr>
    <tr>
    <td><label for="description">Description</label></td>
    <td><input type="text" name="category[description]" id="description" value="<?php echo $Category->description ?>"></td>
    </tr>
    <tr><td><label for="status">Status</label></td>
    <td>
        <select name="category[status]" id="status">
            <?php
            $statusOption = $Category->getCategoryOptions();
            foreach ($statusOption as $key => $value) {
                ?>
                <option value="<?php echo $key ?>" <?php if ($key == $Category->status) echo 'selected' ?>><?php echo $value ?></option>
            <?php

        }
        ?>
            
            
        </select></td>
    </tr>
    <?php $message = 'warning';
    $value = 'Update';
    if (!$Category->id) {
        $message = 'success';
        $value = 'ADD';
    } ?>
    <tr>
        <td><input class="btn btn-<?php echo $message ?>" type="submit" value="<?php echo $value ?>"></td>
    </tr>
    
    </table>
<?php /*</form>*/ ?>
