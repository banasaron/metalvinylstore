<?php
session_start();

function updateCart($productId, $quantity) {
    if(isset($_COOKIE['cart'])) {
        $cart = json_decode($_COOKIE['cart'], true);
    } else {
        $cart = [];
    }

    if ($quantity <= 0) {
        unset($cart[$productId]);
    } else {
        $cart[$productId] = $quantity;
    }

    setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), "/");
}

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    updateCart($productId, $quantity);
}

header("Location: cart.php");
exit();
?>
