<?php
$Shippingmethod = $this->getShippingmethod();


?>

<?php //require_once 'view/header.php' ?>
<br>
<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save', 'shippingmethod', ['id' => $Shippingmethod->id]) ?>" method="POST">
  
    
    <table class="table">
    
    <tr>
    <td><label for="name">Name</label></td>
    <td><input type="text" id="name" name="Shippingmethod[name]" value="<?php echo $Shippingmethod->name ?>"></td>
    </tr>
    <tr>
    <td><label for="price">Code</label></td>
    <td><input type="text" name="Shippingmethod[code]" id="price" value="<?php echo $Shippingmethod->code ?>"></td>
    </tr>
    <tr>
    <td><label for="discount">Amount</label></td>
    <td><input type="number" name="Shippingmethod[amount]" id="discount" value="<?php echo $Shippingmethod->amount ?>"></td>
    </tr>
    <tr>
    <td><label for="quantity">Description</label></td>
    <td><input type="text" name="Shippingmethod[description]" id="quantity" value="<?php echo $Shippingmethod->description ?>"></td>
    </tr>
    
    <tr><td><label for="status">Status</label></td>
    <td>
        <select name="Shippingmethod[status]" id="status">
            <?php
            $statusOption = $Shippingmethod->getShippingmethodOptions();
            foreach ($statusOption as $key => $value) {
                ?>
                <option value="<?php echo $key ?>" <?php if ($key == $Shippingmethod->status) echo 'selected' ?>><?php echo $value ?></option>
            <?php

        }
        ?>
            
            
        </select></td>
    </tr>
    <?php $message = 'warning';
    $value = 'Update';
    if (!$Shippingmethod->id) {
        $message = 'success';
        $value = 'ADD';
    } ?>
    <tr>
        <td><input class="btn btn-<?php echo $message ?>" type="submit" value="<?php echo $value ?>"></td>
    </tr>
    
    </table>
</form>
<?php //require_once 'view/footer.php' ?>