<?php 
session_start();
if(!isset($_SESSION["log"])){
    header("location:login.php");
    exit;
}

function getCart() {
    if(isset($_COOKIE['cart'])) {
        return json_decode($_COOKIE['cart'], true);
    }
    return [];
}

$cart = getCart();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-utilities.css">
    <link rel="stylesheet" href="assets/fontello/css/fontello.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/main.css">
    <title>Vinyl Metal Store - sklep z płytami i vinylami</title>
    <script>
    
    window.onbeforeunload = function() {
        sessionStorage.setItem('scrollPosition', window.scrollY);
    };

    
    window.onload = function() {
        const scrollPosition = sessionStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
        }
    };
</script>
</head>
<body class="parralax">
    <nav class="navbar sticky-top navbar-light justify-content-center">
        <a class="navbar-brand" href="products.php#">
            <img src="assets/img/banner.png" width="150px">
        </a>
        <div class="d-flex flex-column">
            <a href="user_panel.php" class="text-white"><i class="icon-user"></i>Panel uzytkownika</a>
            <a href="contact.php" class="text-white"><i class="icon-phone"></i>Skontaktuj się z nami</a>
            <a href="logout.php" class="text-white"><i class="icon-logout"></i>Wyloguj</a>
            <a href="cart.php" class="text-white"><i class="icon-basket"></i>(
            <?php 
            $sumOfCartProduct=0;
            foreach ($cart as $productId => $quantity) $sumOfCartProduct+=$quantity;
            echo $sumOfCartProduct;
            
            ?> )</a>
        </div>
        
        
    </nav>