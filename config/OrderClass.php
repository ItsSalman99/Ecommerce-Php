<?php
include_once("ShoppingCart.php");

class OrderClass
{
    private $db;
    private $conn;
    private $shoppingCart;

    public function __construct()
    {
        $this->db = new DatabaseProxy();
        $this->conn = $this->db->getConn();
    }


    public function getAllOrders()
    {
        $sql = "SELECT * FROM orders";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            return $result;
        }
    }


    public function saveOrderInHistory()
    {
        $this->shoppingCart = ShoppingCart::getInstance();

        $totalPrice = $this->shoppingCart->getTotalPrice();
        if ($totalPrice > 0) {
            $insertId = $this->insertOrder($totalPrice);
            if (isset($insertId)) {
                $this->insertAllItemsInOrderedItem($insertId);
            }
        }
    }

    public function insertOrder($totalPrice)
    {
        $sql = "INSERT INTO orders (email, order_total)
    VALUES ('" . $_SESSION["email"] . "', " . $totalPrice . ")";

        if ($this->conn->query($sql) === FALSE) {
            echo "Error: " . $this->conn->error;
        }
        //return last inserted id of order
        return $this->conn->insert_id;
    }

    //inser all items in ordered_item table 
    public function insertAllItemsInOrderedItem($insertOrderId)
    {
        $this->shoppingCart = new ShoppingCart();

        $result = $this->shoppingCart->getAllItems();
        while ($row = $result->fetch_assoc()) {
            $sql = "INSERT INTO ordered_item (order_id,	item_id)
      VALUES ('" . $insertOrderId . "', " . $row["item_id"] . ")";

            if ($this->conn->query($sql) === FALSE) {
                echo "Error: " . $this->conn->error;
            }
        }
    }
}
