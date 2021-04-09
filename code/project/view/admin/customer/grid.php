
<?php

$products = $this->getCustomers();


?>
<div class="container contact-form bt" id="container">
<br>
<a class="btn btn-primary bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'customer', null, true) ?>').resetParams().load()">Add Customer</a><br>
<div class="table-responsive">
<table class="table table-hover ">
<tr>
<th scope="col">Id</th>
<th scope="col">FirstName</th>
<th scope="col">LastName</th>
<th scope="col">Email</th>
<th scope="col">Password</th>
<th scope="col">Created Date</th>
<th scope="col">Updated Date</th>
<th scope="col">Group Name</th>
<th scope="col">Billing Address</th>
<th scope="col">Status</th>

<th></th>
</tr>
<?php
foreach ($products->getData() as $key => $value) {
    ?>

<tr>
<td scope="row"><?php echo $value->id; ?></td>
<td><?php echo $value->firstName; ?></td>
<td><?php echo $value->lastName; ?></td>
<td><?php echo $value->email; ?></td>
<td><?php echo $value->password; ?></td>

<td><?php echo $value->createdDate; ?></td>
<td><?php echo $value->updatedDate; ?></td>
<td><?php echo $value->name; ?></td>
<td><?php echo $value->address; ?></td>
<td>
<?php if ($value->status == 1) {
    $message = 'success';
    $status = 'Enable';
} else {
    $message = 'danger';
    $status = 'Disable';
} ?>
<a class="btn btn-<?php echo $message; ?> bt" href="<?php echo $this->getUrl()->getUrl('edit', 'customer', ['id' => $value->id, 'status' => $value->status]); ?> ">
                   <?php echo $status; ?></a></td>
<td> <a class="btn btn-warning bt" style="color:white" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'customer', ['id' => $value->id]); ?>').load() ">
<i class="fas fa-pencil-alt"></i>Edit</a>&nbsp
                    <a class="btn btn-danger bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'customer', ['id' => $value->id]); ?>').load()">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>
</tr>
<?php

}
?>
</table>
</div>
</div>

