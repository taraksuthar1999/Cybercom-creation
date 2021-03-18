<?php
$customer = $this->getCustomer();


?>


<br>




<?php /*<form action="<?php echo $this->getUrl()->getUrl('save', 'customer', ['id' => $customer->id]) ?>" method="post">*/ ?>
    <h3>Customer </h3>
    <div class="row">
        <div class="col-md">

           
           <div class="form-group">
                <div class="col">
                    <label for="status">Customer Group *</label>
                </div>
                <div class="col">
                    <select name="customer[groupid]" class="form-control"  id="status">
                       
                    <?php
                    $statusOption = $customer->getCustomerGroupOptions();
                    foreach ($statusOption as $key => $value) {
                        ?>
                            <option value="<?php echo $key ?>" <?php if ($key == $customer->groupid) echo 'selected' ?>><?php echo $value ?></option>
                        <?php

                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="customer[firstName]" class="form-control" placeholder="First Name *" value="<?php echo $customer->firstName ?>" />
            </div>
            <div class="form-group">
                <input type="text" name="customer[lastName]" class="form-control" placeholder="Last Name *" value="<?php echo $customer->lastName ?>">
            </div>
            <div class="form-group">
                <input type="email" name="customer[email]" class="form-control" placeholder="Email *" value="<?php echo $customer->email ?>"> 
            </div>
            <div class="form-group">
                <input type="password" name="customer[password]" class="form-control" placeholder="Password *" value="<?php echo $customer->password ?>" />
            </div>
           
            <div class="form-group">
                <div class="col">
                    <label for="status">Status *</label>
                </div>
                <div class="col">
                    <select name="customer[status]" class="form-control"  id="status">
                    <?php
                    $statusOption = $customer->getcustomerOptions();
                    foreach ($statusOption as $key => $value) {
                        ?>
                            <option value="<?php echo $key ?>" <?php if ($key == $customer->status) echo 'selected' ?>><?php echo $value ?></option>
                        <?php

                    }
                    ?>
                    </select>
                </div>
            </div>
            
            <?php $message = 'warning';
            $value = 'Update';
            if (!$customer->id) {
                $message = 'success';
                $value = 'ADD';
            } ?>
            <div class="form-group">
                <input type="submit" name="btnSubmit" class="btn btn-<?php echo $message ?> bt" value="<?php echo $value ?> customer" />
            </div>
        </div>

    </div>
<?php //</form> ?>
        