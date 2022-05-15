<?php

interface IPaymentMethod {
  public function pay($totalPrice, $paymentCredentials);
}
