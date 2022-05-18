<?php

session_start();

if (!isset($_SESSION["email"])) {
    $_SESSION['error'] = "Please login to place an order!";
    
}

include_once("./config/ShoppingCart.php");

$shoppingCart = ShoppingCart::getInstance();

$results = $shoppingCart->getAllItems();

$totalPrice = $shoppingCart->getTotalPrice();


?>

<!DOCTYPE html>
<html lang="en">

<?php

include('./public/partials/head.php');

?>

<body>
    <?php

    include('./public/partials/header.php');

    ?>

    <div class="container my-8 mx-auto mt-10 rounded-lg border-2">
        <div class="flex my-10">
            <div class="w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                </div>
                <div class="flex mt-10 mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                    <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Option</h3>
                </div>
                <?php if ($results) {
                    while ($rows = mysqli_fetch_array($results)) { ?>
                        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-2/5">
                                <!-- product -->
                                <div class="w-20">
                                    <?php echo '<img src="' . $rows["img"] . '" alt="item">'; ?>
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">
                                        <?php echo $rows["name"]; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                    <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                </svg>

                                <input class="mx-2 border text-center w-8" type="text" value="<?php echo $rows["quantity"]; ?>">

                                <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                </svg>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">$<?php echo $rows["price"]; ?></span>
                            <span class="text-center w-1/5 font-semibold text-sm">$<?php echo $rows["price"] * $rows["quantity"]; ?></span>
                            <a href="./config/RequestHandler.php?deleteItem=<?php echo $rows["item_id"]; ?>">
                                <div class="bg-gray-800 p-2 border-2 rounded-lg">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>

                                </div>
                            </a>
                        </div>
                <?php }
                } ?>

                <a href="./products.php" class="flex font-semibold text-indigo-600 text-sm mt-10">

                    <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                        <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                    </svg>
                    Continue Shopping
                </a>
            </div>

            <div id="summary" class="w-1/4 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">Total</span>
                    <span class="font-semibold text-sm">$<?php echo $totalPrice ?></span>
                </div>
                <div class="border-t mt-8">
                    <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                        <span>Total cost</span>
                        <span>$<?php echo $totalPrice ?></span>
                    </div>
                    <?php if ($results) { ?>
                        <div class="checkout">
                            <a href="./order.php">
                                <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Proceed to checkout</button>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>

    <?php

    include('./public/partials/footer.php');

    ?>