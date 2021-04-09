<?php
//$customer = $this->getCustomer();

$billing = $this->getbilling();
$shipping = $this->getshipping();

// echo '<pre>';
// print_r($billing);
// print_r($shipping);

// die();
?>


<br>





    <h3>Billing Address </h3>
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">Address *</label>
                </div>
                <div class="col">
                <input type="text" name="billing[address]" class="form-control"  value="<?php echo $billing->address ?>" />
                </div>
            </div>
        </div>
    </div>    
   
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">City *</label>
                </div>
                <div class="col">
                <input type="text" name="billing[city]" class="form-control"  value="<?php echo $billing->city ?>" />
                </div>
            </div>
        </div>
    </div>    
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">State *</label>
                </div>
                <div class="col">
                <input type="text" name="billing[state]" class="form-control"  value="<?php echo $billing->state ?>" />
                </div>
            </div>
        </div>
    </div>    
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">ZipCode *</label>
                </div>
                <div class="col">
                <input type="text" name="billing[zipcode]" class="form-control"  value="<?php echo $billing->zipcode ?>" />
                </div>
            </div>
        </div>
    </div>  
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">Country *</label>
                </div>
                <div class="col">
                <input type="text" name="billing[country]" class="form-control"  value="<?php echo $billing->country ?>" />
                </div>
            </div>
        </div>
    </div>
    <h3>Shipping Address </h3>
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">Address *</label>
                </div>
                <div class="col">
                <input type="text" name="shipping[address]" class="form-control"  value="<?php echo $shipping->address ?>" />
                </div>
            </div>
        </div>
    </div>    
   
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">City *</label>
                </div>
                <div class="col">
                <input type="text" name="shipping[city]" class="form-control"  value="<?php echo $shipping->city ?>" />
                </div>
            </div>
        </div>
    </div>    
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">State *</label>
                </div>
                <div class="col">
                <input type="text" name="shipping[state]" class="form-control"  value="<?php echo $shipping->state ?>" />
                </div>
            </div>
        </div>
    </div>    
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">ZipCode *</label>
                </div>
                <div class="col">
                <input type="text" name="shipping[zipcode]" class="form-control"  value="<?php echo $shipping->zipcode ?>" />
                </div>
            </div>
        </div>
    </div>   
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">Country *</label>
                </div>
                <div class="col">
                <input type="text" name="shipping[country]" class="form-control"  value="<?php echo $shipping->country ?>" />
                </div>
            </div>
        </div>
    </div>  
    <div class="form-group">
                <input type="button" name="btnSubmit" value="Save" onclick="mage.manageAction(this,'<?php echo $this->getUrl()->getUrl('save', 'customer') ?>').load()" class="btn btn-success bt" />
     </div>  

        