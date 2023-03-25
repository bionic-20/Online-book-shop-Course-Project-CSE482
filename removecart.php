<?php
session_start(); //start session
include_once("connection.php"); //include config file

unset($_SESSION['cart']);

setcookie ('shopcart', "", time() - 3600);

?>