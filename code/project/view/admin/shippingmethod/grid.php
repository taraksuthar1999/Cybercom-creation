
<?php

$products = $this->getShippingmethods();



?>
<div class="container contact-form bt" id="container">
<br>
<a class="btn btn-primary" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'Shippingmethod', null, true) ?>').load()">Add Shipping Method</a><br>
<div class=" table-responsive">
<table class="table table-hover">
<tr>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">Code</th>
<th scope="col">Amount</th>
<th scope="col">description</th>
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
<td><?php echo $value->code; ?></td>
<td><?php echo $value->amount; ?></td>
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
<a class="btn btn-<?php echo $message; ?>" href="<?php echo $this->getUrl()->getUrl('edit', 'customer', ['id' => $value->id, 'status' => $value->status]); ?> "
                    <i class="fa fa-pencil" aria-hidden="true"></i><?php echo $status; ?></a></td>
<td> <a class="btn btn-warning" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'Shippingmethod', ['id' => $value->id]); ?>').load() "
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'Shippingmethod', ['id' => $value->id]); ?>').load()">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>
</tr>
<?php

}
?>
</table>
</div>
</div>
