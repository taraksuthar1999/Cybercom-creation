
<?php

$attributes = $this->getAttributes();



$status = 'Disable';
$message = 'danger';
?>


<div class="container contact-form bt" id="container">
<br>
<a class="btn btn-primary bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'attribute', null, true) ?>').load()">Add Product</a><br>
<div class="table-responsive">
<table class="table table-hover ">
<tr>
<th scope="col">Id</th>
<th scope="col">Entity Type ID</th>
<th scope="col">Name</th>
<th scope="col">Code</th>
<th scope="col">Input Type</th>
<th scope="col">Backend Type</th>

<th scope="col">Sort Order</th>

<th></th>
</tr>
<?php if (!$attributes) : ?>
<tr><td colspan="7">No Records Found</td></tr>
<?php else : ?>
<?php

foreach ($attributes->getData() as $key => $value) {
    ?>

<tr>
<td scope="row"><?php echo $value->attributeId; ?></td>
<td><?php echo $value->entityTypeId; ?></td>
<td><?php echo $value->name; ?></td>
<td><?php echo $value->code; ?></td>
<td><?php echo $value->inputType; ?></td>
<td><?php echo $value->backendType; ?></td>

<td><?php echo $value->sortOrder; ?></td>

<td> <button class="btn btn-warning bt" style="color:white;" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'attribute', ['id' => $value->attributeId]); ?>').resetParams().load()" >
<i class="fas fa-pencil-alt"></i>Edit</button>&nbsp
                    <button class="btn btn-danger bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'attribute', ['id' => $value->attributeId]); ?>').resetParams().load()" href="javascript:void(0)">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </button></td>
</tr>
<?php

}
?>
<?php endif ?>
</table>
</div>
</div>


