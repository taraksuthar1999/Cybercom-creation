<?php
$configGroup = $this->getTableRow();



?>


<br>



    <h3>Config Group </h3>
    <div class="row">
        <div class="col-md">

            <div class="form-group">
                <input type="text" name="configGroup[name]" class="form-control" placeholder="Group Name *" value="<?php echo $configGroup->name ?>" />
            </div>
            
            <?php $message = 'warning';
            $value = 'Update';
            if (!$configGroup->groupId) {
                $message = 'success';
                $value = 'ADD';
            } ?>
            <div class="form-group">
                <input type="button" name="btnSubmit" class="btn btn-<?php echo $message ?> bt" onclick="mage.manageAction(this,'<?= $this->getUrl()->getUrl('save', 'configGroup') ?>').load()" value="<?php echo $value ?> Config Group" />        
            </div>
        </div>

    </div>


