<?php
    session_start();
    $current_user = $_SESSION['log'];
    $cnn = new mysqli('localhost', 'root', '', 'sklep');
    $sql = "SELECT kod_pocztowy, miejscowosc, ulica, nr_domu_lokalu FROM user WHERE login='$current_user';";
    $result = $cnn->query($sql);
    $user_data = $result->fetch_row();

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    if(empty($cart)){
        echo "<p>Koszyk jest pusty. Nie mozna złożyć zamówienia</p>";
        exit();
    }
    if(!is_null($user_data[0]) && !is_null($user_data[1]) && !is_null($user_data[2]) && !is_null($user_data[3])){
        $cartFormated = [];
        $totalCost = 0;

        foreach($cart as $productId => $quantity){
            $sql_price = "SELECT cena FROM vinyls WHERE id = '$productId'";
            $result_price = $cnn->query($sql_price);

            if ($result_price && $result_price->num_rows > 0) {
                $product = $result_price->fetch_assoc();
                $productCost = $product['cena'] * $quantity;
                $totalCost += $productCost;

                $cartFormated[] = "ID{$productId}x{$quantity}";
            }
            
        }

        $cartString = implode(', ', $cartFormated);
        $sql_insert = "INSERT INTO orders(user_login, cart, koszt) VALUES('$current_user', '$cartString', '$totalCost')";
        if($cnn->query($sql_insert)===TRUE){
            echo "zamowienie zostalo zfinalizowane";
            setcookie('cart', '', time() - 3600 , '/'); 
        }else{
            echo "Error: " . $sql_insert . "<br>" . $cnn->error;
        }
    }else{
        echo "<p>Prosze uzupełnić dane wysyłkowe w <a href='user_panel.php?current_section=shipping'>panelu użytkownika</a></p>";
    }
    
    exit();
?>