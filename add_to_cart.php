<?php
session_start();
function addToCart($productId){
    if(isset($_COOKIE['cart'])) $cart = json_decode($_COOKIE['cart'], true);
    else $cart = [];

    if(array_key_exists($productId, $cart))  $cart[$productId]++;
    else $cart[$productId] = 1;

    setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), "/");
}

if (isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']);
    addToCart($productId);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();