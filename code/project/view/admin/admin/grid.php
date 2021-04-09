
<?php

$products = $this->getAdmins();



?>

    
<div class="container contact-form bt" id="container">

           <br>
<a class="bt btn btn-primary" href="<?php echo $this->getUrl()->getUrl('edit', 'Admin', null, true) ?>">Add Customer</a><br>
<table class="table table-hover table-responsive-sm">
<tr>
<th scope="col">Id</th>
<th scope="col">User Name</th>
<th scope="col">Password</th>
<th scope="col">Created Date</th>
<th scope="col">Status</th>
<th></th>
</tr>
<?php
foreach ($products->getData() as $key => $value) {
    ?>

<tr>
<td scope="row"><?php echo $value->id; ?></td>
<td><?php echo $value->username; ?></td>
<td><?php echo $value->password; ?></td>
<td><?php echo $value->createdDate; ?></td>
<td>
<?php if ($value->status == 1) {
    $message = 'success';
    $status = 'Enable';
} else {
    $message = 'danger';
    $status = 'Disable';
} ?>
<a class="btn btn-<?php echo $message; ?> bt" href="<?php echo $this->getUrl()->getUrl('edit', 'customer', ['id' => $value->id, 'status' => $value->status]); ?> "
                    <i class="fa fa-pencil" aria-hidden="true"></i><?php echo $status; ?></a></td>
<td> <a class="btn btn-warning bt" href="<?php echo $this->getUrl()->getUrl('edit', 'Admin', ['id' => $value->id]); ?> "
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger bt" href="<?php echo $this->getUrl()->getUrl('delete', 'Admin', ['id' => $value->id]); ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>
</tr>
<?php

}
?>
</table>
        </div>
   