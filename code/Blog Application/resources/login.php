<?php
include 'controller/user.php';
$user = new User();
if (isset($_POST['login'])) {
    $user->loginCheck($_POST);
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
<div class ='content'>
        <div class="content-head-text">
        <b>login page #</b><br>
        </div>
        <br>
        <div class = "form-container">
    <form action="login.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br><br>
        <input class="btn btn-primary" type="submit" id="login" name ="login" value="Login">
        <a href="register.php" class="btn btn-success">Register</a>
    </form>
    </div>
    </div>
</body>
</html>