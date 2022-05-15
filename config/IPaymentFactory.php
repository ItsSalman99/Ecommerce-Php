<?php

interface IPaymentFactory {
  public function getPaymentMethod($paymentMethod);
}