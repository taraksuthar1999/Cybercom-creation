<?php
$Admin = $this->getAdmin();


?>


<br>
<form class="form-group" action="<?php echo $this->getUrl()->getUrl('save', 'Admin', ['id' => $Admin->id]) ?>" method="POST">
  
    
    <table class="table">
    
    <tr>
    <td><label for="name">User Name</label></td>
    <td><input type="text" id="name" name="Admin[username]" value="<?php echo $Admin->username ?>"></td>
    </tr>
    <tr>
    <td><label for="price">Password</label></td>
    <td><input type="password" name="Admin[password]" id="price" value="<?php echo $Admin->password ?>"></td>
    </tr>
      
    <tr><td><label for="status">Status</label></td>
    <td>
        <select name="Admin[status]" id="status">
            <?php
            $statusOption = $Admin->getAdminOptions();
            foreach ($statusOption as $key => $value) {
                ?>
                <option value="<?php echo $key ?>" <?php if ($key == $Admin->status) echo 'selected' ?>><?php echo $value ?></option>
            <?php

        }
        ?>
            
            
        </select></td>
    </tr>
    <?php $message = 'warning';
    $value = 'Update';
    if (!$Admin->id) {
        $message = 'success';
        $value = 'ADD';
    } ?>
    <tr>
        <td><input class="btn btn-<?php echo $message ?>" type="submit" value="<?php echo $value ?>"></td>
    </tr>
    
    </table>
</form>
