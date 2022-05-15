<?php
include_once("IPaymentMethod.php");
include_once("DatabaseProxy.php");

class CreditCardMethod implements IPaymentMethod
{
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

  public function pay($totalPrice, $paymentCredentials)
  {


    $sql = "Insert into credit (card_number, card_holder_name, cvv, balance) Values('" . $paymentCredentials["cardNumber"] .
      "','" . $paymentCredentials["holderName"] . "','" . $paymentCredentials["cvv"] . "','"  . $totalPrice . "' )";

    if (mysqli_query($this->conn, $sql)) {
      $_SESSION['success'] = $totalPrice . " successfully paid by " . $paymentCredentials["holderName"] . ' with Credit Card!';
      return true;
    } else {
      $_SESSION['error'] = 'Something went wrong, Payment Failed!!' . $sql . '</br>' . mysqli_error($this->conn);
      return false;
    }
  }
}
