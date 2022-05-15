<?php
include_once(__DIR__."\IDatabase.php");

class Database implements IDatabase{
  private $conn;

  public function __construct($servername, $username, $password, $dbname )
  {
    $this->conn = new mysqli($servername, $username, $password, $dbname);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function getConn() {
    return $this->conn;
  }

}

