<?php
include_once("RegisterUser.php");
include_once("LoginUser.php");
include_once("ShoppingCart.php");
include_once("CheckoutClass.php");
include_once("OrderClass.php");

class EShopFacade
{

    public function register($registerData)
    {
        $name = $registerData['name'];
        $email = $registerData['email'];
        $password = $registerData['password'];

        $registerUser = new RegisterUser();

        $registerUser->register($name, $email, $password);
    }

    public function login($email, $password)
    {
        $loginUser = new LoginUser();

        $loginStatus = $loginUser->login($email, $password);

        if ($loginStatus) {
            $_SESSION["email"] = $email;
            $_SESSION['success'] = "Logged in successfully!";
            header("Location: ../index.php");
        } else {
            $_SESSION['error'] = "Wrong credentials, user doesn't exit in our system!";
            header('Location: ../login.php');
        }
    }

    public function addItemToCart($itemId, $quantity)
    {
        $cart = ShoppingCart::getInstance();
        $cart->insertItem($itemId, $quantity);
        header('Location: ../index.php');
    }

    public function deleteItemFromCart($itemId)
    {
        $cart = ShoppingCart::getInstance();
        $cart->removeItem($itemId);
        $_SESSION['success'] = "Item removed from cart successfully!";
        header('Location: ../cart.php');
    }

    public function order($paymentCredentials)
    {
        $checkoutClass = new CheckoutClass();
        $paymentStatus = $checkoutClass->checkout($paymentCredentials);
        
        if ($paymentStatus) {
            //update product quantity
            $checkoutClass->updateQuantityAfterCheckout();

            //save order in history
            $order = new OrderClass();
            $order->saveOrderInHistory();

            //clear cart
            $cartController = ShoppingCart::getInstance();
            $cartController->clearCart();

            // return true;
            header('Location: ../index.php');
        } else {
            $_SESSION['error'] = "Payment Failed";
            header('Location: ../order.php');
        }
    }
}
