<?php
$Paymentmethod = $this->getPaymentmethod();


?>


<br>
<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save', 'Paymentmethod', ['id' => $Paymentmethod->id]) ?>" method="POST">
  
    
    <table class="table">
    
    <tr>
    <td><label for="name">Name</label></td>
    <td><input type="text" id="name" name="Paymentmethod[name]" value="<?php echo $Paymentmethod->name ?>"></td>
    </tr>
    <tr>
    <td><label for="price">Code</label></td>
    <td><input type="text" name="Paymentmethod[code]" id="price" value="<?php echo $Paymentmethod->code ?>"></td>
    </tr>
    <tr>
    <td><label for="discount">Amount</label></td>
    <td><input type="number" name="Paymentmethod[amount]" id="discount" value="<?php echo $Paymentmethod->amount ?>"></td>
    </tr>
    <tr>
    <td><label for="quantity">Description</label></td>
    <td><input type="text" name="Paymentmethod[description]" id="quantity" value="<?php echo $Paymentmethod->description ?>"></td>
    </tr>
    
    <tr><td><label for="status">Status</label></td>
    <td>
        <select name="Paymentmethod[status]" id="status">
            <?php
            $statusOption = $Paymentmethod->getPaymentmethodOptions();
            foreach ($statusOption as $key => $value) {
                ?>
                <option value="<?php echo $key ?>" <?php if ($key == $Paymentmethod->status) echo 'selected' ?>><?php echo $value ?></option>
            <?php

        }
        ?>
            
            
        </select></td>
    </tr>
    <?php $message = 'warning';
    $value = 'Update';
    if (!$Paymentmethod->id) {
        $message = 'success';
        $value = 'ADD';
    } ?>
    <tr>
        <td><input class="btn btn-<?php echo $message ?>" type="submit" value="<?php echo $value ?>"></td>
    </tr>
    
    </table>
</form>
