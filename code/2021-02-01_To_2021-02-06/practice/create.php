<?php
include 'oopDBConnect.php';
$curd = new Curd();
if (isset($_POST['submit'])) {
    $curd->insert($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
        <label for="name">name</label>
        <input type="text" name="name" id="name"><br>
        <input type="checkbox" name="pet[]" id="dog" value="dog"><label for="dog">Dog</label><br>
        <input type="checkbox" name="pet[]" id="dog" value="cat"><label for="cat">Cat</label><br><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>