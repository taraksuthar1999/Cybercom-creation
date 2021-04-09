<?php
$cart = $this->getCart();
$billing = $this->getCart()->getBillingAddress();
$shipping = $this->getCart()->getShippingAddress();
?>






<div class="container contact-edit bt" id="container">
<br>
<div class="row">
    <h4>Billing Address </h4></div>
    <div class="row ">
        <div class="col-md">
            <div class="form-group">
                <div class="col">
                    <label for="status">Address *</label>
                </div>
                <div class="col">
                <input type="text" name="cart[<?php echo $cart->cartId ?>][billing][data][address]" class="form-control"  value="<?php echo $billing->address ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][billing][data][city]" class="form-control"  value="<?php echo $billing->city ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][billing][data][state]" class="form-control"  value="<?php echo $billing->state ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][billing][data][zip]" class="form-control"  value="<?php echo $billing->zip ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][billing][data][country]" class="form-control"  value="<?php echo $billing->country ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="row">
                    <div class="form-group">
                        <div class="col">
                            <label for="status">Save In Address Book *</label>
                        </div>
                        <div class="col">
                        <div class = "row">
                        <div class="col">
                        <label for="SaveFlag">YES</label>
                        <input type="radio" name="cart[<?php echo $cart->cartId ?>][billing][billingSaveFlag]" value="1">
                        </div>
                        <div class="col">
                        <label for="SameFlag">NO</label>
                        <input type="radio" name="cart[<?php echo $cart->cartId ?>][billing][billingSaveFlag]" value="0" >
                        </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
</div>
<div class="container contact-edit bt" id="container">

    <h4>Shipping Address </h4>
    <div class="row ">
        <div class="col-md">
        <div class="form-group">
                <div class="col">
                    <label for="status">Address *</label>
                </div>
                <div class="col">
                <input type="text" name="cart[<?php echo $cart->cartId ?>][shipping][data][address]" class="form-control"  value="<?php echo $shipping->address ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][shipping][data][city]" class="form-control"  value="<?php echo $shipping->city ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][shipping][data][state]" class="form-control"  value="<?php echo $shipping->state ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][shipping][data][zip]" class="form-control"  value="<?php echo $shipping->zip ?>" />
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
                <input type="text" name="cart[<?php echo $cart->cartId ?>][shipping][data][country]" class="form-control"  value="<?php echo $shipping->country ?>" />
                </div>
            </div>
        </div>
    </div> 
    <div class="row ">
        <div class="col-md">
            <div class="row">
                <div class="form-group">
                    <div class="col">
                        <label for="status">Same As Billing *</label>
                    </div>
                    <div class="col">
                    <div class = "row">
                    <div class="col">
                    <label for="SaveFlag">YES</label>
                    <input type="radio" name="cart[<?php echo $cart->cartId ?>][shipping][shippingSameFlag]" value="1">
                    </div>
                    <div class="col">
                    <label for="SameFlag">NO</label>
                    <input type="radio" name="cart[<?php echo $cart->cartId ?>][shipping][shippingSameFlag]" value="0" >
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="row">
                <div class="form-group">
                    <div class="col">
                        <label for="status">Save In Address Book *</label>
                    </div>
                    <div class="col">
                    <div class = "row">
                    <div class="col">
                    <label for="SaveFlag">YES</label>
                    <input type="radio" name="cart[<?php echo $cart->cartId ?>][shipping][shippingSaveFlag]" value="1">
                    </div>
                    <div class="col">
                    <label for="SameFlag">NO</label>
                    <input type="radio" name="cart[<?php echo $cart->cartId ?>][shipping][shippingSaveFlag]" value="0" >
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> 
    
     <div class="form-group">
                <input type="button" onclick="mage.manageAction(this,'<?php echo $this->getUrl()->getUrl('saveCart', 'cart') ?>').load()" name="btnSubmit" value="Save" class="btn btn-success bt" />
     </div>  
</div>