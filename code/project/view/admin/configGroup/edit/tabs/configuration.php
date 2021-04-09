<?php
$configGroup = $this->getTableRow();
$configs = $configGroup->getConfigurations();


?>

<div class="container contact-form bt" id="container">
<br>

<div class="row"><div class="col-3"><a class="btn btn-primary bt" onclick="mage.manageAction(this,'<?php echo $this->getUrl()->getUrl('save', 'configGroup\configuration') ?>').load()">Save</a></div><div class="col-9"><a class="btn btn-primary bt" onclick="config.addRow()">Add Row</a><br></div></div>

<div class="table-responsive">
<table class="table table-hover " id="configTable">
<tr>

<th scope="col">Title</th>
<th scope="col">Value</th>
<th scope="col">Code</th>


<th></th>
</tr>
<?php if (!$configs) : ?>
<tr><td colspan="7">No Records Found</td></tr>
<?php else : ?>
<?php

foreach ($configs->getData() as $key => $value) {
    ?>

<tr>

<td><input type="text" name="config[exists][<?= $value->configId ?>][title]" value="<?php echo $value->title; ?>" id=""></td>
<td><input type="text" name="config[exists][<?= $value->configId ?>][code]" id="" value="<?php echo $value->code; ?>"></td>
<td><input type="text" name="config[exists][<?= $value->configId ?>][value]" id="" value="<?php echo $value->value; ?>"></td>


<td> 
                    <a class="btn btn-danger bt" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('delete', 'configGroup_Configuration', ['id' => $value->configId]); ?>').resetParams().load()" href="javascript:void(0)">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
</a></td>
</tr>
<?php

}
?>
<?php endif ?>
</table>
</div>
</div>
