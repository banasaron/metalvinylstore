<?php include 'assets/include/header.php'; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-7 bg-sort">
            <div class="row m-3 mt-5 mb-5 text-white justify-content-center">
                <h1>Koszyk</h1>
                <ul>
                    <?php
                    $cnn = new mysqli('localhost', 'root', '', 'sklep');
                    $totalPrice = 0; // Inicjalizowanie sumy cen

                    if(empty($cart)): ?>
                        <li>Koszyk jest pusty</li>
                    <?php else: ?>
                        <?php foreach($cart as $productId => $quantity):
                            $sql = "SELECT nazwa, zespol, cena FROM vinyls WHERE id = '$productId'";
                            $result = $cnn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                $product = $result->fetch_assoc();
                                $productPrice = $product['cena'] * $quantity; 
                                $totalPrice += $productPrice; 
                                ?>
                                <li class="d-flex align-items-center">
                                    <img class='album-image-cart' src='assets/img/albums/<?= $product['zespol']?>/<?= $product['nazwa']?>.jpg' alt='<?= $product['nazwa']?> - <?= $product['zespol']?>'>
                                    <div class="flex-column flex-fill">    
                                        <strong>Album:</strong> <?php echo htmlspecialchars($product['nazwa']); ?><br>
                                        <strong>Zespół:</strong> <?php echo htmlspecialchars($product['zespol']); ?><br>
                                        <strong>Cena za sztukę:</strong> £<?php echo htmlspecialchars($product['cena']); ?><br>
                                        <strong>Łączna cena:</strong> £<?php echo htmlspecialchars($productPrice); ?><br>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <form action="update_cart.php" method="post" style="display: inline;">
                                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productId); ?>">
                                            <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($quantity - 1); ?>">
                                            <button type="submit" class="btn btn-outline-light btn-sm">-</button>
                                        </form>
                                        <strong>Ilość:</strong> <?php echo htmlspecialchars($quantity); ?>
                                        <form action="update_cart.php" method="post" style="display: inline;">
                                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productId); ?>">
                                            <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($quantity + 1); ?>">
                                            <button type="submit" class="btn btn-outline-light btn-sm">+</button>
                                        </form>
                                    </div>
                                </li>
                                <hr>
                                <?php
                            } else {
                                echo "<li>Nie znaleziono szczegółów dla produktu ID: " . htmlspecialchars($productId) . "</li>";
                            }
                        endforeach; ?>
                    <?php endif; ?>
                </ul>
                <h4 class="text-white">Suma: £<?php echo number_format($totalPrice, 2); ?></h4>
                <form action="clear_cart.php" method="post" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-danger">Wyczyść koszyk</button>
                </form> 
                <form action="order.php" method="post" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-success">Złóż zamówienie</button>
                </form> 
            </div>
        </div>
    </div>
</div>

<?php include 'assets/include/footer.php'; ?>
