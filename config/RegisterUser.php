<?php
include_once("DatabaseProxy.php");

class RegisterUser
{
    private $db;
    private $conn;


    public function __construct()
    {
        $this->db = new DatabaseProxy();
        $this->conn = $this->db->getConn();
    }


    public function register($name, $email, $password)
    {
        $stmt = $this->conn->prepare("insert into users (name,email,password)
            values(?,?,?)");
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        $_SESSION['email'] = $email;
        $_SESSION['success'] = $name . " registered successfully!!";
        header("Location: ../login.php");
        $stmt->close();
    }
}
