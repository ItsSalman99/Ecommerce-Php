<?php
include_once(__DIR__."\IDatabase.php");
include_once(__DIR__."\Database.php");

class DatabaseProxy implements IDatabase {
  private $database = null;

  public function __construct(){  }

  public function getConn() {
    if($this->database == null) {
      $this->database = new Database("localhost","root", "", "ecommerce");
    }
    return $this->database->getConn();
  }

}