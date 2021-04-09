<?php
$product = $this->getProduct();

//$updatedDate = date("Y-m-d\TH:i:s", strtotime($product['updatedDate']));
//$createdDate = date("Y-m-d\TH:i:s", strtotime($product['createdDate']));

?>


<br>



    <h3>Product </h3>
    <div class="row">
        <div class="col-md">

            <div class="form-group">
                <input type="text" name="product[name]" class="form-control" placeholder="Product Name *" value="<?php echo $product->name ?>" />
            </div>
            <div class="form-group">
                <input type="text" name="product[price]" class="form-control" placeholder="Product Price *" value="<?php echo $product->price ?>">
            </div>
            <div class="form-group">
                <input type="text" name="product[discount]" class="form-control" placeholder="Product Discount *" value="<?php echo $product->discount ?>"> 
            </div>
            <div class="form-group">
                <input type="number" name="product[quantity]" class="form-control" placeholder="Product Quantity *" value="<?php echo $product->quantity ?>" />
            </div>
            <div class="form-group">
                <textarea name="product[description]" class="form-control" placeholder="Product Description *" style="width: 100%; height: 150px;"><?php echo $product->description ?></textarea>
            </div>
            <div class="form-group">
                <div class="col">
                    <label for="status">Status *</label>
                </div>
                <div class="col">
                    <select name="product[status]" class="form-control"  id="status">
                    <?php
                    $statusOption = $product->getProductOptions();
                    foreach ($statusOption as $key => $value) {
                        ?>
                            <option value="<?php echo $key ?>" <?php if ($key == $product->status) echo 'selected' ?>><?php echo $value ?></option>
                        <?php

                    }
                    ?>
                    </select>
                </div>
            </div>
            <?php $message = 'warning';
            $value = 'Update';
            if (!$product->id) {
                $message = 'success';
                $value = 'ADD';
            } ?>
            <div class="form-group">
                <input type="button" name="btnSubmit" class="btn btn-<?php echo $message ?> bt" onclick="mage.setForm(this).load()" value="<?php echo $value ?> Product" />        
            </div>
        </div>

    </div>


