<?php
$cart = $this->getCart();
$payments = $cart->getPaymentMethods();

?>
<br>
<div class="container contact-edit bt" id="container">
<br>
<h4>Select Payment Method</h4>
<div class="row">
    <div class="col">
        <?php foreach ($payments->getData() as $key => $payment) : ?>
            <div class="row ">
                <div class="col-md">
                    <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="status"><?= $payment->name ?> *</label>
                        </div>
                        <div class="col">
                        <input type="radio" name="cart[<?php echo $cart->cartId ?>][paymentMethod]" class="form-control"  value="<?= $payment->id ?>" <?= ($payment->id == $cart->paymentMethodId) ? 'checked' : null ?>/>
                        </div>
                    </div>
                    </div>
                </div>
            </div>    
        <?php endforeach; ?>
    </div>
</div>
</div>