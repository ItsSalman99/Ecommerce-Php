<?php

// class RequestHandler { }
include_once("EShopFacade.php");

session_start();

$eShopFacade = new EShopFacade();

//register
if(isset($_POST["registerForm"])){
  $eShopFacade->register($_POST);
}

//login
if(isset($_POST["loginForm"])) {
  $eShopFacade->login($_POST['email'], $_POST['password']);
}

//add item
if(isset($_GET["addItem"])){
  $eShopFacade->addItemToCart($_GET["addItem"], $_GET["quantity"]);
}


//delete item
if(isset($_GET["deleteItem"])){
  $eShopFacade->deleteItemFromCart($_GET["deleteItem"]);
}

//checkout
if(isset($_POST["submitPayment"])) {
  $eShopFacade->order($_POST);
}


