<?php require_once 'view/header.php' ?>
<br>
<form class="form-group" action="<?php echo $this->getUrl('save', 'product'); ?>" method="POST">
   <!-- Name:<input type="text" name="name"><br>
    price:<input type="text" name="price"><br>
    quantity:<input type="number" name="quantity" id="">
    <br><br>-->
    
    <table class="table">
    <tr>
    <td><label for="id">Id</label></td>
    <td><input type="text" name="product[id]" value="" disabled></td>
    </tr>
    <!--<tr>
    <td><label for="sku">Serial Key</label></td>
    <td><input type="text" name="product[sku]" value="" ></td>
    </tr>-->
    <tr>
    <td><label for="name">Name</label></td>
    <td><input type="text" id="name" name="product[name]" ></td>
    </tr>
    <tr>
    <td><label for="price">Price</label></td>
    <td><input type="text" name="product[price]" id="price" ></td>
    </tr>
    <tr>
    <td><label for="discount">Discount</label></td>
    <td><input type="text" name="product[discount]" id="discount" ></td>
    </tr>
    <tr>
    <td><label for="quantity">Quantity</label></td>
    <td><input type="number" name="product[quantity]" id="quantity"></td>
    </tr>
    <tr>
    <td><label for="description">Description</label></td>
    <td><input type="text" name="product[description]" id="description"></td>
    </tr>
    <tr><td><label for="status">Status</label></td>
    <td>
        <select name="product[status]" id="status">
            <?php
            $statusOption = ['1' => 'Enable', '0' => 'Disable'];
            foreach ($statusOption as $key => $value) {
                ?>
                <option value="<?php echo $key ?>"><?php echo $value ?></option>
            <?php

        }
        ?>
            
            
        </select></td>
    </tr>
    <tr>
        <td><input type="hidden" name="createdDate" value="<?php echo date("Y-m-d H:i:s") ?>"></td>
    </tr>
    <tr>
        <td><input class="btn btn-success" type="submit" value="insert"></td>
    </tr>
    
    </table>
</form>
<?php require_once 'view/footer.php' ?>