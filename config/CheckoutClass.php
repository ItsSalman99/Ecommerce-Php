<?php
include_once("ShoppingCart.php");
include_once("Item.php");
include_once("PaymentFactory.php");
include_once("OrderClass.php");
include_once("PaypalMethod.php");
include_once("CreditCardMethod.php");
include_once("PaymentFactory.php");

class CheckoutClass
{
    private $db;
    private $conn;
    private $Item;
    protected $shoppingCart;
    private $paymentMethod;

    public function __construct()
    {
        $this->db = new DatabaseProxy();
        $this->conn = $this->db->getConn();
        $this->shoppingCart = ShoppingCart::getInstance();
    }

    //paymentCredentials is an array holds payment info.
    public function checkout($paymentCredentials)
    {
        if (!isset($_SESSION["email"])) {
            die("Not logged in");
        }
        $checkQuantity = $this->shoppingCart->checkQuantity();
        if (!$checkQuantity) {
            echo "quantities of items are not satisfied";
            return;
        }
        $totalPrice = $this->shoppingCart->getTotalPrice();

        $paymentFactory = new PaymentFactory();
        $this->paymentMethod = $paymentFactory->getPaymentMethod($paymentCredentials["pay_method"]);

        if (isset($this->paymentMethod)) {
            $paymentStatus = $this->paymentMethod->pay($totalPrice, $paymentCredentials);
            return $paymentStatus;
        }
    }

    //update items after payment
    public function updateQuantityAfterCheckout()
    {
        $this->shoppingCart = ShoppingCart::getInstance();
        $this->Item = new Item();

        $result = $this->shoppingCart->getAllItems();
        while ($row = $result->fetch_assoc()) {
            $this->Item->decreaseQuantityOfItem($row["item_id"], $row["quantity"]);
        }
    }
}
