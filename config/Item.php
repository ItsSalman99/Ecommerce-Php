<?php
include_once("Item.php");
include_once("DatabaseProxy.php");

class Item {
  private $db;
  private $conn;
  // private $shoppingCartModel;

  public function __construct()
  {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }

  //get items
  public function getAllItems() {
    $sql = "SELECT * FROM item";
    return $this->conn->query($sql);
  }

  //update one item
  public function decreaseQuantityOfItem($id, $quantity) {
    $sql = "UPDATE item SET quantity=quantity - ". $quantity ." WHERE id=".$id;

    if ($this->conn->query($sql) === FALSE) {
      echo "Error updating record: " . $this->conn->error;
    }
  }
}
