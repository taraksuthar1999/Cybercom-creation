<?php
class User
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

        // Insert customer data into customer table
    public function validate($post)
    {
       // $error = new array
        if (empty($_POST['prefix'])) {
            return false;
        } else if (empty($_POST['lastname'])) {
            return false;
        } else if (empty($_POST['firstname'])) {
            return false;
        } else if (empty($_POST['lastname'])) {
            return false;
        } else if (empty($_POST['email'])) {
            return false;
        } else if (empty($_POST['mobilenumber'])) {
            return false;
        } else if (empty($_POST['password']) && empty($_POST['confirmpassword'])) {
            return false;
        } else if ($_POST['password'] != $_POST['confirmpassword']) {
            return false;
        } else {
            return true;
        }
    }
    public function registerData($post)
    {
        if ($this->validate($post)) {
            $prefix = $this->con->real_escape_string($_POST['prefix']);
            $firstname = $this->con->real_escape_string($_POST['firstname']);
            $lastname = $this->con->real_escape_string($_POST['lastname']);
            $email = $this->con->real_escape_string(($_POST['email']));
            $mobilenumber = $this->con->real_escape_string($_POST['mobilenumber']);
            $password = $this->con->real_escape_string($_POST['password']);
            $confirmpassword = $this->con->real_escape_string($_POST['confirmpassword']);
            $information = $this->con->real_escape_string($_POST['information']);
            $name = $this->con->real_escape_string($_POST['prefix']);

            $query = "INSERT INTO user(id,prefix,firstname,lastname,email,mobilenumber,password,information) VALUES(NULL,'$prefix','$firstname','$lastname','$email','$mobilenumber','$password','$information')";

            $sql = $this->con->query($query);
            if ($sql == true) {
                header("Location:login.php?msg1=insert");
            } else {
                $error = "failed";
                echo "Registration failed try again!";

            }
        } else {
            echo 'error';
        }
    }

    public function loginCheck($post)
    {
        $email = $this->con->real_escape_string($_POST['email']);
        $password = $this->con->real_escape_string($_POST['password']);
        $query = "SELECT email,password FROM user WHERE email='$email' and password='$password'";

        $sql = $this->con->query($query);


        $result = mysqli_num_rows($sql);
        if ($result >= 1) {
            session_start();
            $_SESSION['userid'] = $email;
            header("Location:blogPostListing.php");
        } else {
            $error = "failed";
            echo "login failed try again!";

        }
    }
}
?>