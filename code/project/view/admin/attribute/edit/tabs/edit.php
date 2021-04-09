<?php
$attribute = $this->getTableRow();
?>


<br>



    <h3>Attribute</h3>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <div class="col">
                    <label for="status">Entity Type *</label>
                </div>
                <div class="col">
                    <select name="attribute[entityTypeId]" class="form-control"  id="status">
                    <?php foreach ($attribute->getEntityTypeOptions() as $key => $value) : ?>
                   
                        <option value="<?php echo $key ?>" <?php if ($key == $attribute->entityTypeId) echo 'selected' ?>><?php echo $value ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <input type="text" name="attribute[name]" class="form-control" placeholder="Name *" value="<?php echo $attribute->name ?>" />
            </div>
            <div class="form-group">
                <input type="text" name="attribute[code]" class="form-control" placeholder="Code *" value="<?php echo $attribute->code ?>">
            </div>
            <div class="form-group">
                <div class="col">
                    <label for="status">Input Type *</label>
                </div>
                <div class="col">
                    <select name="attribute[inputType]" class="form-control"  id="status">
                    <?php foreach ($attribute->getInputTypeOptions() as $key => $value) : ?>
                   
                        <option value="<?php echo $key ?>" <?php if ($key == $attribute->inputType) echo 'selected' ?>><?php echo $value ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <label for="status">Backend Type *</label>
                </div>
                <div class="col">
                    <select name="attribute[backendType]" class="form-control"  id="status">
                    <?php foreach ($attribute->getBackendTypeOptions() as $key => $value) : ?>
                   
                        <option value="<?php echo $key ?>" <?php if ($key == $attribute->backendType) echo 'selected' ?>><?php echo $value ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="attribute[sortOrder]" class="form-control" placeholder="Sort Order *" value="<?php echo $attribute->sortOrder ?>"> 
            </div>
            
           
           
            <?php $message = 'warning';
            $value = 'Update';
            if (!$attribute->id) {
                $message = 'success';
                $value = 'ADD';
            } ?>
            <div class="form-group">
                <input type="button" name="btnSubmit" class="btn btn-<?php echo $message ?> bt" onclick="mage.manageAction(this,'<?= $this->getUrl()->getUrl('save', 'attribute'); ?>').load()" value="<?php echo $value ?> attribute" />        
            </div>
        </div>

    </div>


