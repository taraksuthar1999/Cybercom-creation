<?php
  
  // Include database file
include 'userContact.php';

$contactObj = new Contacts();

  // Edit contact record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $contact = $contactObj->displyaRecordById($editId);
    $date = date("Y-m-d\TH:i:s", strtotime($contact['datetime']));
}


  // Update Record in contact table
if (isset($_POST['update'])) {
    $contactObj->updateRecord($_POST);
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
  <link rel="stylesheet" href="../public_html/css/create.css">
    <title>Document</title>
</head>
<body>  
    <header><?php require 'header.php'; ?></header>
    <div class ='content'>
        <div class="content-head-text">
        <b>Update Contact #<?php echo $contact['id']; ?></b><br>
        </div>
        <br>
        <div class = "form-container">
            <form action="update.php" method="POST">
                <table class="tab" cellpadding="20px">
                    <tr>
                        <td>
                            <label for="id">ID</label>
                            <input class="input" type="text" name="id" id="id" value="<?php echo $contact['id']; ?>">
                        </td>
                        <td>
                            <label for="name">Name</label>
                            <input class="input" type="text" name="name" id="name"  value="<?php echo $contact['name']; ?>" required >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email</label>
                            <input class="input" type="email" name="email" id="email" value="<?php echo $contact['email']; ?>" required>
                        </td>
                        <td>
                            <label for="phone">Phone</label>
                            <input class="input" type="text" name="phone" id="phone" required value="<?php echo $contact['phone']; ?>"  title="10 digit number required">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="title">Title</label>
                            <input class="input" type="text" name="title" id="title" value="<?php echo $contact['title']; ?>" required>
                        </td>
                        <td>
                           <label for="datetime">Created</label>
                            <input class="input" type="datetime-local" name="datetime" id="datetime" value="<?php echo $date; ?>" required>
                        </td>
                    </tr>
                   
                </table>
                <br>
                <br>
                <input type="submit" class="btn btn-warning" name="update" value="Update">
            </form>
        </div>
        

    </div>
</body>
</html>