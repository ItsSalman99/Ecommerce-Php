<?php

session_start();

if (isset($_SESSION["email"])) {
    header("Location: ./index.php");
}
  
?>

<!DOCTYPE html>
<html lang="en">
<?php

include('./public/partials/head.php');

?>

<body>

    <?php

    include('public/partials/header.php');

    ?>
    <!-- Login Form -->
    <div class="container mx-auto p-2">
        <div class="max-w-sm mx-auto my-24 bg-white px-5 py-10 border-2 rounded shadow-xl">
            <div class="text-center mb-8">
                <h1 class="font-bold text-2xl font-bold">Login to Ecommerce Store</h1>
            </div>
            <form action="./config/RequestHandler.php" method="POST">
                <div class="mt-5">
                    <label for="username">Username or Email</label>
                    <input type="text" id="username" name="email" class="block w-full p-2 border rounded border-gray-500" />
                </div>
                <div class="mt-5">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="block w-full p-2 border rounded border-gray-500" />
                </div>
                <div class="mt-10">
                    <input type="submit" value="Login" name="loginForm" class="py-3 bg-green-500 hover:bg-green-600 rounded text-white text-center w-full" />
                </div>
            </form>
        </div>
    </div>


    <script src="./public/assets/index.js"></script>

</body>

</html>