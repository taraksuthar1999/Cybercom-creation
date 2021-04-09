
<?php

$cart = $this->getCart();
$cartItem = $cart->getItems();
$customers = $cart->getCustomers()->getData();
$total = $cart->getTotal();






$status = 'Disable';
$message = 'danger';
?>

<form action="" method="POST">
<div class="row">
<div class="col-8">
    <div class="container contact-form bt" id="container">

        <br>
        <a class="btn btn-primary bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'product', null, true) ?>').load()">Back</a><br>


        <div class="row">
            <div class = "col-lg">
            
                    <div class="form-group">
                        <div class="col">
                            <label for="status">Select Customer *</label>
                        </div>
                        <div class="col">
                        
                            <select name="customerId" class="form-control" onchange="mage.manageAction(this,'<?php echo $this->getUrl()->getUrl('change', 'cart', null, true); ?>').load();" id="status">
                            <option value="">Select</option>

                            <?php foreach ($customers as $key => $customer) : ?>
                        
                        
                                <option value="<?php echo $customer->id; ?>" <?php if ($customer->id == $cart->customerId) echo 'selected' ?>><?php echo "{$customer->firstName} {$customer->lastName}"; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        
                    </div>
        
        
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <tr>
                        <th scope="col">Cart Item Id</th>
                        <th scope="col">CartId</th>
                        <th scope="col">ProdcutId</th>
                        <th scope="col">Quantity</th>

                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">BasePrice</th>
                        <th scope="col">Created Date</th>

                        <th></th>
                        </tr>
                        <?php if (!$cartItem) : ?>
                        <tr>
                        <td colspan="7">Nothing to show</td>
                        </tr>
                        <?php else : ?>
                        <?php

                        foreach ($cartItem->getData() as $key => $value) {
                            $this->addTotal($value->price, $value->quantity);
                            ?>

                        <tr>
                        <td scope="row"><?php echo $value->cartItemId; ?></td>
                        <td><?php echo $value->cartId; ?></td>
                        <td><?php echo $value->productId; ?></td>
                        <td><input type="number" value="<?php echo $value->quantity; ?>" onchange="mage.manageAction(this,'<?php echo $this->getUrl()->getUrl('save', 'cart'); ?>').load()" name="quantity[<?php echo $value->cartItemId ?>]" ></td>
                        <td><input type="number" value="<?php echo $value->price; ?>" name="price[<?= $value->cartItemId ?>]" onchange="mage.manageAction(this,'<?php echo $this->getUrl()->getUrl('updatePrice', 'cart'); ?>').load()" id=""></td>
                        <td><?php echo $value->discount ?></td>
                        <td><?php echo $value->basePrice; ?></td>

                        <td><?php echo $value->createdDate; ?></td>

                        <td> 
                        <a class="btn btn-danger bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'cart', ['id' => $value->cartItemId]); ?>').resetParams().load()" href="javascript:void(0)"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                        </td>
                        </tr>
                        <?php

                    }
                    ?>
                        <?php endif; ?>
                        <tr>
                        <td colspan="7">Base Total: Rs.<?php echo $this->getTotal(); ?></td>
                        </tr>
                    </table>

                </div>

            </div>
        </div>

    </div>
    <?php if ($cart->customerId && $cartItem) : ?>

    <?= $this->createBlock('Block\Admin\Cart\Address')->setCart($cart)->toHtml(); ?>


</div>
<div class="col-4">  
    <div class="row">
        <div class="col">
        <?= $this->createBlock('Block\Admin\Cart\Payment')->setCart($cart)->toHtml(); ?> 
        </div>
    </div>
    <div class="row">
        <div class="col">
        <?= $this->createBlock('Block\Admin\Cart\Shipping')->setCart($cart)->toHtml(); ?> 
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="container contact-edit bt" id="container">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <tr>
                    <th></th>
                    <th>Base Total</th>
                    </tr>
                    <tr><td></td><td><?= $this->getTotal() ?></td></tr>
                    <tr>
                    <th>-</th>
                    <th>Discount</th>
                    </tr>
                    <tr>
                    <td></td>
                    <td><input type="number" name="discount[<?= $cart->cartId ?>]" onchange="mage.manageAction(this,'<?php echo $this->getUrl()->getUrl('updateDiscount', 'cart') ?>').load()" value="<?= ($cart->discount) ? $cart->discount : 0; ?>" id=" " ></td>
                    </tr>
                    <tr>
                    <th>+</th>
                    <th>Shipping Charge</th>
                   
                    </tr>
                    <tr>
                    <td></td>
                    <td><?= $this->getShippingAmount() ?></td>
                    
                    </tr>
                    <tr>
                    <th>=</th>
                    <th colspan=" 6 ">Grand Total</th>
                    </tr>
                    <tr>
                    <td></td>
                    <td colspan=" 6 "><?= $total ?></td>
                    </tr>
                   
                </table>
            </div>
            <div class =" col ">
            <div class = " row ">
            <div class=" col "><input type="button" class=" btn btn-success btn-lg "  onclick=" mage.manageAction(this, '<?php echo $this->getUrl()->getUrl('saveCart', 'cart') ?>').load() " value=" Save "></div>
            <div class=" col "><input type="button" class=" btn btn-danger btn-lg " onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('save', 'order', ['id' => $cart->cartId]) ?>').load()"  value=" Place Order "></div>

            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>
</div>
</form>

