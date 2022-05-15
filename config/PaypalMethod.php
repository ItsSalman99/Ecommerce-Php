<?php
include_once("IPaymentMethod.php");
include_once("DatabaseProxy.php");

class PaypalMethod implements IPaymentMethod
{

  private $db;
  private $conn;

  public function __construct()
  {
    $this->db = new DatabaseProxy();
    $this->conn = $this->db->getConn();
  }

  public function pay($totalPrice, $paymentCredentials)
  {
    $balance = 0;

    $sql = "Insert into paypal (email, password, balance) Values('" . $paymentCredentials["email"] . "',
    '" . $paymentCredentials["password"] . "','" . $totalPrice . "' )";
    
    if (mysqli_query($this->conn, $sql)) {
      $_SESSION['success'] = $totalPrice . " successfully paid by " . $paymentCredentials["email"] . ' with PayPal!';
      return true;
    } else {
      $_SESSION['error'] = 'Something went wrong, Payment Failed!!'. $sql . '</br>'. mysqli_error($this->conn);
      return false;
    }
  }
}
