
<?php

$products = $this->getCategories();





?>


<div class="container contact-form bt" id="container">

<br>
<a class="btn btn-primary" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'Category', null, true) ?>').load()">Add Category</a><br>
<div class="table-responsive">
<table class="table table-hover ">
<tr>
<th scope="col">Id</th>
<th scope="col">Name</th>
<th scope="col">ParentId</th>

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
<td><?php echo $this->getCategoryName($value) ?></td>
<td><?php echo $value->parentId; ?></td>

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
<a class="btn btn-<?php echo $message; ?>" href="<?php echo $this->getUrl()->getUrl('edit', 'Product', ['id' => $value->id, 'status' => $value->status]); ?> "
                    <i class="fa fa-pencil" aria-hidden="true"></i><?php echo $status; ?></a></td>
<td> <a class="btn btn-warning" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'category', ['id' => $value->id]); ?>').load()"
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'category', ['id' => $value->id]); ?>').load()">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a></td>
</tr>
<?php

}
?>
</table>
</div>
</div>

