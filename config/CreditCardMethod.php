<?php
include_once("IPaymentMethod.php");
include_once("DatabaseProxy.php");

class CreditCardMethod implements IPaymentMethod {
  // private $card_number;
  // private $card_holder_name;
  // private $cvv;

  // public function __construct($card_number,	$card_holder_name,	$cvv)
  // {
  //   $this->card_number = $card_number;
  //   $this->card_holder_name = $card_holder_name;
  //   $this->cvv = $cvv;
  // }
  private $db;
  private $conn;

  public function __construct()
  {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }

  public function pay($totalPrice, $paymentCredentials) {
    $balance = 0;

    $sql = "SELECT balance FROM credit WHERE card_number='".$paymentCredentials["cardNumber"]."'	card_holder_name='".$paymentCredentials["holderName"]."'	cvv='".$paymentCredentials["cvv"]."'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $balance = $row["balance"];
      }

      if($balance >= $totalPrice) {
        $sql = "UPDATE credit SET balance=balance - ". $totalPrice ." WHERE card_number='".$paymentCredentials["cardNumber"]."'";

        if ($this->conn->query($sql) === FALSE) {
          return false;
        }
      }
    } else {
      return false;
    }
  }
}