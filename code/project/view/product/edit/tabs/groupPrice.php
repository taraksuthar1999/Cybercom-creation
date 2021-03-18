<?php

$CustomerGroups = $this->getCustomerGroups();

?>



<br>
<input type="submit" id="priceUpdate" value="Update"><br>
<div class="table-responsive">
<table class="table table-hover ">
<tr>
<th scope="col">Group Id</th>
<th scope="col">Group Name</th>
<th scope="col">Price</th>
<th scope="col">Group Price</th>
<th></th>
</tr>
<?php
foreach ($CustomerGroups->getData() as $key => $value) {
    $groupStatus = ($value->entityId) ? 'Exists' : 'New';
    ?>

<tr>
<td scope="row"><?php echo $value->groupId; ?></td>
<td><?php echo $value->groupName; ?></td>
<td><?php echo $value->price; ?></td>
<td><input type="text" name="groupPrice[<?php echo $groupStatus ?>][<?php echo $value->groupId ?>]" id="" value="<?php echo $value->groupPrice; ?>"></td>


</tr>
<?php

}
?>
</table>
</div>


