<?php

session_start();

if (!isset($_SESSION["email"])) {
    header("Location: ./cart.php");
}

include_once("./config/ShoppingCart.php");

$shoppingCart = ShoppingCart::getInstance();

$totalPrice = $shoppingCart->getTotalPrice();
?>

<!DOCTYPE html>
<html>

<?php

include('./public/partials/head.php');

?>

<body>
    <?php include('./public/partials/header.php'); ?>

    <!--Start order-->
    <section class="min-h-screen p-4 bg-gray-200 leading-loose">
        <div>
            <div class="max-w-lg mx-auto m-4 p-4 bg-white rounded shadow-xl">
                <form action="./config/RequestHandler.php" method="POST" onchange="changeForm()">
                    <div class="flex items-start space-x-3 py-6">
                        <input type="radio" class="border-gray-300 rounded h-8 w-8" value="paypal" name="pay_method" id="paypal" checked />

                        <div class="flex flex-col">
                            <h1 class="text-xl text-gray-700 font-medium leading-none">Pay with Paypal</h1>
                            <p class="text-xs text-gray-500 mt-2 leading-4">Pay easily with Paypal</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3 py-6">
                        <input type="radio" class="border-gray-300 rounded h-8 w-8" value="creditCard" name="pay_method" id="creditCard" />

                        <div class="flex flex-col">
                            <h1 class="text-xl text-gray-700 font-medium leading-none">Pay with Credit Card</h1>
                            <p class="text-xs text-gray-500 mt-2 leading-4">Pay easily with your credit card</p>
                        </div>
                    </div>
                    <div class="paypal_container">
                        <div class="form-container active">
                            <p class="text-gray-800 font-medium">Customer information</p>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="">Email</label>
                                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="" name="email" type="email"  placeholder="Your Email" aria-label="Email">
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="">Password</label>
                                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="" name="password" type="password"  placeholder="Your Email" aria-label="Email">
                            </div>
                        </div>
                    </div>
                    <div class="creditcard_container">
                        <div class="form-container active">
                            <p class="text-gray-800 font-medium">Customer information</p>
                            <p class="mt-4 text-gray-800 font-medium">Payment information</p>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Card</label>
                                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="cardNumber" type="text"  placeholder="Card Number" aria-label="Name">
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Cvv</label>
                                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="cvv" type="text"  placeholder="CVV" aria-label="Name">
                            </div>
                            <div class="">
                                <label class="block text-sm text-gray-600" for="cus_name">Name</label>
                                <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="holderName" type="text"  placeholder="Card Number MM/YY CVC" aria-label="Name">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <input type="submit" name="submitPayment" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" id="address-continue" value="Confirm" >
                    </div>
                </form>
    </section>
    <!--End order-->

    <?php
    
    include('./public/partials/footer.php');

?>
  