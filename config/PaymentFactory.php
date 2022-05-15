<?php
include_once("IPaymentFactory.php");
include_once("CreditCardMethod.php");
include_once("PaypalMethod.php");

class PaymentFactory implements IPaymentFactory {

  public function getPaymentMethod($requestedPaymentMethod) {
    if($requestedPaymentMethod == "creditCard") {
      return new CreditCardMethod();
    } else if($requestedPaymentMethod == "paypal") {
      return new PaypalMethod();
    }
    return null;
  }
}