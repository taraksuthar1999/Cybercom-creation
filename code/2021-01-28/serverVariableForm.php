<?php
$serverVar = $_SERVER['SCRIPT_NAME'];


?>
<form action=" <?php echo $serverVar; ?>" method = "POST">
    <input type="submit" name="submit" value="submit">

</form>