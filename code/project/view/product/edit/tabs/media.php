
<?php

$productMedia = $this->getMedia();

// echo '<pre>';
// print_r($productMedia);
// die();



?>



<br>
<h3>Product Media</h3>
<?php
if (!$productMedia) {
    echo 'No Data!';
} else {
    ?>
<div class="row">
<div class="col-8"></div>
<div class="col-2"><input type="submit" class="btn btn-warning" id="update" value="Update"  ></div>
<div class="col-2"><input type="submit" class="btn btn-warning" id="remove" value="Remove"></div>

</div>
<div class="table-responsive">
<table class="table table-hover ">
<tr>
<th scope="col">Image</th>
<th scope="col">Label</th>
<th scope="col">Small</th>
<th scope="col">Thumb</th>
<th scope="col">Base</th>
<th scope="col">Gallery</th>
<th scope="col">Remove</th>

</tr>
<?php 


foreach ($productMedia->getData() as $key => $value) {
    ?>

<tr>

<td scope="row"><img src="Image/Product/<?php echo $value->imageName ?>" alt="image" height="80px" srcset=""></td>
<td><input type="text" name="image[data][<?php echo $value->imageId ?>][label]" value="<?php echo $value->label ?>" id=""></td>
<td><input type="radio" name="image[small]" value="<?php echo $value->imageId ?>" id="" <?php if ($value->small) : ?>checked<?php endif ?>></td>
<td><input type="radio" name="image[thumb]" value="<?php echo $value->imageId ?>" id="" <?php if ($value->thumb) : ?>checked<?php endif ?>></td>
<td><input type="radio" name="image[base]" value="<?php echo $value->imageId ?>" id="" <?php if ($value->base) : ?>checked<?php endif ?>></td>

<td><input type="checkbox" name="image[data][<?php echo $value->imageId ?>][gallery]" value="1" id="" <?php if ($value->gallery) : ?>checked<?php endif ?> ></td>
<td><input type="checkbox" name="image[remove][<?php echo $value->imageId ?>]" value="remove" id=""></td>

</tr>
<?php

}

?>
</table>
</div>
<?php 
} ?>
<div class='row'>

<div class='col-4'><input type="file" name='photo' src="" alt=""></div>
<div class='col-8'><input type="submit" class='btn btn-primary' id="upload"  value="Upload"></div>

</div>
<br>



