<?php

class Contacts
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "phppractice";
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
    public function insertData($post)
    {

        $name = $this->con->real_escape_string($_POST['name']);
        $email = $this->con->real_escape_string($_POST['email']);
        $phone = $this->con->real_escape_string($_POST['phone']);
        $title = $this->con->real_escape_string(($_POST['title']));
        $datetime = $this->con->real_escape_string($_POST['datetime']);


        $query = "INSERT INTO contacts(id,name,email,phone,title,datetime) VALUES(NULL,'$name','$email',$phone,'$title','$datetime')";

        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:contacts.php?msg1=insert");
        } else {
            $error = "failed";
            echo "Registration failed try again!";

        }
    }

		// Fetch customer records for show listing
    public function displayData()
    {
        $query = "SELECT * FROM contacts";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

		// Fetch single data for edit from customer table
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM contacts WHERE id = '$id'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

		// Update customer data into customer table
    public function updateRecord($postData)
    {
        $name = $this->con->real_escape_string($_POST['name']);
        $email = $this->con->real_escape_string($_POST['email']);
        $phone = $this->con->real_escape_string($_POST['phone']);
        $title = $this->con->real_escape_string(($_POST['title']));
        $datetime = $this->con->real_escape_string($_POST['datetime']);


        $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE contacts SET name = '$name', email = '$email', phone = '$phone', title = '$title', datetime = '$datetime' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                header("Location:contacts.php?msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }

    }


		// Delete customer data from contact table
    public function deleteRecord($id)
    {
        $query = "DELETE FROM contacts WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:contacts.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

}


?>