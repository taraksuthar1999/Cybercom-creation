
<?php

$configGroups = $this->getConfigGroups();


$status = 'Disable';
$message = 'danger';
?>


<div class="container contact-form bt" id="container">
<br>
<a class="btn btn-primary bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'configGroup', null, true) ?>').load()">Add Product</a><br>
<div class="table-responsive">
<table class="table table-hover ">
<tr>
<th scope="col">GroupId</th>
<th scope="col">Name</th>
<th scope="col">Created Date</th>

<th></th>
</tr>
<?php if (!$configGroups) : ?>
<tr><td colspan="4">No Records Found</td></tr>
<?php else : ?>
<?php

foreach ($configGroups->getData() as $key => $value) {
    ?>

<tr>
<td scope="row"><?php echo $value->groupId; ?></td>
<td><?php echo $value->name; ?></td>
<td><?php echo $value->createdDate; ?></td>

<td> <button class="btn btn-warning bt" style="color:white;" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('edit', 'configGroup', ['id' => $value->groupId]); ?>').resetParams().load()" >
<i class="fas fa-pencil-alt"></i>Edit</button>&nbsp
                    <button class="btn btn-danger bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'configGroup', ['id' => $value->groupId]); ?>').resetParams().load()" href="javascript:void(0)">
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


