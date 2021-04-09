
<?php

$products = $this->getProducts();



$status = 'Disable';
$message = 'danger';
?>


<div class="container contact-form bt" id="container">
<br>
<div class="row">
<div class="col-2">
<a class="btn btn-primary bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'product', null, true) ?>').load()">Add Product</a><br>
</div>
<div class="col-10">
<a class="btn btn-primary bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'cart', null, true) ?>').load()">Go To Cart</a><br>
</div>
</div>

<div class="table-responsive">
<table class="table table-hover ">
<tr>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">Price</th>
<th scope="col">Discount</th>
<th scope="col">Quantity</th>
<th scope="col">Description</th>

<th scope="col">Created Date</th>
<th scope="col">Updated Date</th>
<th scope="col">Status</th>
<th></th>
</tr>
<?php
foreach ($products->getData() as $key => $value) {
    ?>

<tr>
<td scope="row"><?php echo $value->id; ?></td>
<td><?php echo $value->name; ?></td>
<td><?php echo $value->price; ?></td>
<td><?php echo $value->discount; ?></td>
<td><?php echo $value->quantity; ?></td>
<td><?php echo $value->description; ?></td>

<td><?php echo $value->createdDate; ?></td>
<td><?php echo $value->updatedDate; ?></td>
<td>
<?php if ($value->status == 1) {
    $message = 'success';
    $status = 'Enable';
} else {
    $message = 'danger';
    $status = 'Disable';
} ?>
<a class="btn btn-<?php echo $message; ?> bt" href="#">
                    <?php echo $status; ?></a></td>
<td> <button class="btn btn-warning bt" style="color:white;" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'Product', ['id' => $value->id]); ?>').resetParams().load()" >
<i class="fas fa-pencil-alt"></i>Edit</button>&nbsp
                    <button class="btn btn-danger bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'product', ['id' => $value->id]); ?>').resetParams().load()" href="javascript:void(0)">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </button> <button class="btn btn-danger bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('add', 'cart', ['id' => $value->id]); ?>').resetParams().load()" href="javascript:void(0)">
                    <i class="fa fa-trash" aria-hidden="true"></i>Add TO Cart
                    </button></td>
</tr>
<?php

}
?>
</table>
</div>
</div>


