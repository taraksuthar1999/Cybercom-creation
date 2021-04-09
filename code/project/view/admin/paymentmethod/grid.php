
<?php

$products = $this->getPaymentmethods();



?>
<div class="container contact-form bt" id="container">
<br>
<a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', 'Paymentmethod', null, true) ?>">Add Customer</a><br>

<div class ="table-responsive">
<table class="table table-hover ">
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
<td> <a class="btn btn-warning" href="<?php echo $this->getUrl()->getUrl('edit', 'Paymentmethod', ['id' => $value->id]); ?> "
<i class="fas fa-pencil-alt"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete', 'Paymentmethod', ['id' => $value->id]); ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>
</tr>
<?php

}
?>
</table>
</div>
</div>

