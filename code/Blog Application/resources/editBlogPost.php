<?php
  
  // Include database file
include 'controller/blogpost.php';

$blogObj = new Blogpost();

  //
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $row = $blogObj->displyaRecordById($editId);
    $date = date("Y-m-d\TH:i:s", strtotime($row['publisheddate']));
}


  // 
if (isset($_POST['update'])) {
    $blogObj->updateBlog($_POST);
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
  <link rel="stylesheet" href="../public_html/css/home.css">
    <title>Document</title>
</head>
<body>  
    <header><?php require 'header.php'; ?></header>
    <div class ='content'>
        <div class="content-head-text">
        <b>Edit Blog Post #<?php echo $row['id'] ?></b><br>
        </div>
        <br>
        <div class = "form-container">
            <form action="editBlogPost.php" method="POST" enctype="multipart/form-data">
                <table class="tab" cellpadding="20px">
                    
                    <tr>
                        <td><label for="title">Title</label></td>
                        <td><input class ="input" type="text" name="title" id="title" value="<?php echo $row['title'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="content"></label>Content</td>
                        <td><textarea name="content" id="content" cols="50" rows="5" value="" required><?php echo $row['content'] ?></textarea> </td>
                    </tr>
                    <tr>
                        <td><label for="url">Url</label></td>
                        <td><input class ="input" type="text" name="url" id="url" value="<?php echo $row['url'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="publisheddate">Published At</label></td>
                        <td><input class ="input" type="datetime-local" name="publisheddate" id="publisheddate" value="<?php echo $date ?>" required></td>
                    </tr>
                    <tr>
                        <td><label>Category</label></td>
                        <td><input class ="input" type="checkbox" name="category[]" value="education" id="education"><label for="education">Education</label><br>
                        <input class ="input" type="checkbox" name="category[]" value="lifestyle" id="lifestyle"><label for="lifestyle">Lifestyle</label><br>
                        <input class ="input" type="checkbox" name="category[]" value="health" id="health"><label for="health">Health</label><br>
                        <input class ="input" type="checkbox" name="category[]" value="music" id="music"><label for="music">Music</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="file">Upload</label></td>
                        <td><input class ="input" type="file" name="file" id="file" value="<?php echo $row['file'] ?>" required><?php echo $row['file'] ?></td>
                    </tr>
                    
                   
                </table>
                <br>
                
                <input type="submit" class="btn btn-success" name="update" value="Update">
            </form>
        </div>
        

    </div>
</body>
</html>