<?php


include 'controller/blogpost.php';

$blogObj = new Blogpost();


if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $blogObj->deleteRecord($deleteId);
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
              Blog Post Added Successfully
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
        <b>BLog Posts</b><br>
        </div>
        <br><a href="addBlogPost.php" class="btn btn-success">Create Blog Category</a><br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Post Id</th>
                <th>Category Name</th>
                <th>Title</th>
                <th>Published Date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
       <tbody>
            <?php 
            $blog = $blogObj->displayData();
            foreach ($blog as $row) {
                ?>
            <tr class="delete_mem<?php echo $row['id'] ?>">
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['category'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['publisheddate'] ?></td>
               
                <td>
                    <a class="btn btn-warning" href="editBlogPost.php?editId=<?php echo $row['id'] ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>&nbsp
                    <a class="btn btn-danger" id ="<?php echo $row['id'] ?>" >
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
    <script>
        
                $(document).ready(function() {
                    $('.btn-danger').click(function() {
                    var id = $(this).attr("id");
                    if (confirm("Are you sure you want to delete this Member?")) {
                $.ajax({
                    type: "POST",
                    url: "deleteBlog.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>
    
</body>
</html>