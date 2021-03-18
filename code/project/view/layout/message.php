
<?php
if ($success = $this->getMessage()->getSuccess()) {
    $this->getMessage()->clearSuccess();
    echo "<div class='alert alert-success alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    {$success}
  </div>";

}
if ($failure = $this->getMessage()->getFailure()) {
    $this->getMessage()->clearFailure();
    echo "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    {$failure}
  </div>";

}
if ($notice = $this->getMessage()->getNotice()) {
    $this->getMessage()->clearNotice();
    echo "<div class='alert alert-danger alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert'>&times;</button>
    {$notice}
  </div>";

}
?>