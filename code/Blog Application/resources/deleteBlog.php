<?php
  
  // Include database file
include 'controller/blogpost.php';

$blogObj = new Blogpost();

  // Delete record from table

$deleteId = $_POST['id'];

$blogObj->deleteRecord($deleteId);


?>