<?php
class Curd
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "phppractice";
    public $con;
    public function __construct()
    {
        $this->con = new mysqli($this->hostname, $this->username, $this->password, $this->db);
        if (mysqli_connect_error()) {
            trigger_error('error occured' . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }
    public function insert($post)
    {
        $name = $this->con->real_escape_string($_POST['name']);
        $checkbox = $_POST['pet'];
        if (!empty($post)) {
            $query1 = "INSERT INTO people (id,name) VALUES (NULL,$name)";
            $sql1 = $this->con->query($query1);
            foreach ($checkbox as $pet) {
                $petname = $this->con->real_escape_string($pet);
                $query3 = "INSERT INTO pet (id,pet) VALUES (NULL,$petname)";
                $sql2 = $this->con->query($query3);
            }
            if ($sql1 == true && $sql2 == true) {
                header("Location:create.php?msg3=insert");
            } else {
                echo 'error occured in query';
            }


        }
    }


}


?>