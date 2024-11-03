<?php
session_start();


setcookie('cart', '', time() - 3600, '/'); 

header("Location: cart.php");
exit;
?>
