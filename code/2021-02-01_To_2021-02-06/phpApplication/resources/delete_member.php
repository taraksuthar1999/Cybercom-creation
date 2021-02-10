<?php
  
  // Include database file
include 'userContact.php';

$contactObj = new Contacts();

  // Delete record from table

$deleteId = $_POST['id'];

$contactObj->deleteRecord($deleteId);


?>