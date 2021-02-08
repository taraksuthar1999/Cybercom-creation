<?php
  
  // Include database file
include 'userContact.php';

$contactObj = new Contacts();

  // Delete record from table
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $contactObj->deleteRecord($deleteId);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe"
        crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../public_html/css/home.css">
    <title>Document</title>
</head>
<body>  
    <header><?php require 'header.php'; ?></header>
    <?php
    if (isset($_GET['msg1']) == "insert") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Contact added successfully
            </div>";
    }
    if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Contact updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
    ?>
    <div class ='content'>
        <div class="content-head-text">
        <b>Read Contacts</b><br>
        </div>
        <br><a href="create.php" class="btn btn-success">Create Contact</a><br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Title</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $contacts = $contactObj->displayData();
            foreach ($contacts as $contact) {
                ?>
            <tr>
                <td><?php echo $contact['id'] ?></td>
                <td><?php echo $contact['name'] ?></td>
                <td><?php echo $contact['email'] ?></td>
                <td><?php echo $contact['phone'] ?></td>
                <td><?php echo $contact['title'] ?></td>
                <td><?php echo $contact['datetime'] ?></td>
                <td>
                    <a class="btn btn-warning" href="update.php?editId=<?php echo $contact['id'] ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" href="contacts.php?deleteId=<?php echo $contact['id'] ?>"onclick="confirm('Are you sure want to delete this record')">
                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                    </a>
                </td>
            </tr>
            <?php 
        }
        ?>
        </tbody>
    </table>
        

    </div>
</body>
</html>