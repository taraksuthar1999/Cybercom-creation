<?php
class Blogpost
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "evaluation_test2";
    public $con;


		// Database Connection 
    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());

        } else {

            return $this->con;
        }
    }

    public function fileupload($post)
    {
        $target = '/projects/Cybercom-creation/code/Blog Application/public_html/uploads/';
        $target = $_SERVER['DOCUMENT_ROOT'] . $target . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
            return true;
            //Tells you if its all ok 
            //echo "The file ". basename( $_FILES['uploaded_file']['name']). " has been uploaded, and your information has been added to the directory"; 
        } else {
            return false;
            //Gives and error if its not 
            //echo "Sorry, there was a problem uploading your file."; 
        }
    }
    public function validate($post)
    {
       // $error = new array
        if (empty($_POST['title'])) {
            return false;
        } else if (empty($_POST['content'])) {
            return false;
        } else if (empty($_POST['url'])) {
            return false;
        } else if (empty($_POST['publisheddate'])) {
            return false;

        } else {
            return true;
        }
    }
    public function addBlog($post)
    {
        if ($this->validate($post)) {
            $title = $this->con->real_escape_string($_POST['title']);
            $content = $this->con->real_escape_string($_POST['content']);
            $url = $this->con->real_escape_string($_POST['url']);
            $publisheddate = $this->con->real_escape_string(($_POST['publisheddate']));
            $categorydata = $_POST['category'];
            $categorystring = htmlentities(implode(',', $categorydata));
            $Category = $this->con->real_escape_string($categorydata);
            $filename = $_FILES['file']['name'];
            $file = $this->con->real_escape_string($filename);
            $filecheck = $this->fileupload($post);



            $query = "INSERT INTO blog_post(id,user_id,title,content,url,publisheddate,category,file) VALUES (NULL,'1','$title','$content','$url','$publisheddate','$Category','$file')";

            $sql = $this->con->query($query);
            if ($sql == true) {
                header("Location:blogPostListing.php?msg1=success");
            } else {
                $error = "failed";
                echo "Registration failed try again!";

            }
        } else {
            echo 'error';
        }


    }
    public function updateBlog($post)
    {
        if ($this->validate($post)) {
            $title = $this->con->real_escape_string($_POST['title']);
            $content = $this->con->real_escape_string($_POST['content']);
            $url = $this->con->real_escape_string($_POST['url']);
            $publisheddate = $this->con->real_escape_string(($_POST['publisheddate']));
            $categorydata = $_POST['category'];
            $categorystring = htmlentities(implode(',', $categorydata));
            $Category = $this->con->real_escape_string($categorydata);
            $filename = $_FILES['file']['name'];
            $file = $this->con->real_escape_string($filename);
            $filecheck = $this->fileupload($post);

            $id = $this->con->real_escape_string($_POST['id']);

            $query = "UPDATE blog_post SET title='$title',content='$content',url='$url',publisheddate='$publisheddate',catagory='$Category',file='$file' WHERE id ='$id'";

            $sql = $this->con->query($query);
            if ($sql == true) {
                header(" Location : blogPostListing.php?msg1 = update ");
            } else {
                $error = " failed ";
                echo " Registration failed try again !";

            }
        } else {
            echo 'error';
        }


    }
    		// Fetch customer records for show listing
    public function displayData()
    {
        $query = " SELECT * FROM blog_post ";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo " No found records ";
        }
    }
        
                // Fetch single data for edit from customer table
    public function displyaRecordById($id)
    {
        $query = " SELECT * FROM contacts WHERE id = '$id' ";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo " Record not found ";
        }
    }
    public function deleteRecord($id)
    {
        $query = " DELETE FROM blog_post WHERE id = '$id' ";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header(" Location :  blogPostListing.php. php ? msg3 = delete ");
        } else {
            echo " Record does not delete try again ";
        }
    }




}
?>