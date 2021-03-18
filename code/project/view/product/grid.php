
<?php

$products = $this->getProducts();



$status = 'Disable';
$message = 'danger';
?>


<div class="container contact-form bt" id="container">
<br>
<a class="btn btn-primary bt" href="<?php echo $this->getUrl()->getUrl('edit', 'product', null, true) ?>">Add Product</a><br>
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
<a class="btn btn-<?php echo $message; ?> bt" href="<?php echo $this->getUrl()->getUrl('edit', 'Product', ['id' => $value->id, 'status' => $value->status]); ?> ">
                    <?php echo $status; ?></a></td>
<td> <a class="btn btn-warning bt" style="color:white;" href="<?php echo $this->getUrl()->getUrl('edit', 'Product', ['id' => $value->id]); ?> ">
<i class="fas fa-pencil-alt"></i>Edit</a>&nbsp
                    <a class="btn btn-danger bt" href="<?php echo $this->getUrl()->getUrl('delete', 'product', ['id' => $value->id]); ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>
</tr>
<?php

}
?>
</table>
</div>
</div>


