<?php
$cart = $this->getCart();
$shippings = $cart->getShippingMethods();

?>
<br>
<div class="container contact-edit bt" id="container">
<br>
<h4>Select Shipping Method</h4>
<div class="row">
    <div class="col">
        <?php foreach ($shippings->getData() as $key => $shipping) : ?>
            <div class="row ">
                <div class="col-md">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="status"><?= $shipping->name ?> *</label>
                        </div>
                        <div class="col">
                        <input type="radio" name="cart[<?php echo $cart->cartId ?>][shippingMethod]" class="form-control"  value="<?= $shipping->id ?>" <?= ($shipping->id == $cart->shippingMethodId) ? 'checked' : null; ?>/>
                        </div>
                    </div>
                    </div>
                </div>
            </div>    
        <?php endforeach; ?>
    </div>
</div>
</div>