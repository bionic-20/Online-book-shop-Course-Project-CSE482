<?php
session_start(); //start session
include_once("connection.php"); //include config file

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$_SESSION['cart'][] = $_POST['id'];

setcookie('shopcart', json_encode($_SESSION['cart']), time()+3600);

?>