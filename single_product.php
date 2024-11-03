<?php include 'assets/include/header.php'; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-7 bg-sort">
            <div class="row justify-content-center m-5 text-white">
                <?php 
                    $band_product = $_GET["band_product"];
                    $cnn = new mysqli('localhost', 'root', '', 'sklep');

                    
                    $sql = "SELECT id, nazwa, zespol, cena, rok_wydania FROM vinyls WHERE nazwa='$band_product';";
                    $result = $cnn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $productId = $row['id']; 

                        echo '<div class="col-6">';
                            echo "<img class='single-product-image' src='assets/img/albums/{$row['zespol']}/{$row['nazwa']}.jpg' alt='{$row['zespol']} - {$row['nazwa']}'>";
                        echo '</div>';
                        echo '<div class="col-4 d-flex flex-column">';
                            echo "<h2 class='text-capitalize'>{$row['nazwa']}</h2>";
                            echo "<p class='text-uppercase'>{$row['zespol']}</p>";
                            echo "<p class='flex-fill'>data produkcji: {$row['rok_wydania']}</p>";
                            echo "<h3>£{$row['cena']}</h3>";
                            
                            
                            echo '<form action="add_to_cart.php" method="post" style="margin-top: 10px;">';
                                echo "<input type='hidden' name='product_id' value='$productId'>";
                                echo '<button type="submit" class="btn btn-primary">DODAJ DO KOSZYKA <i class="fa fa-shopping-cart"></i></button>';
                            echo '</form>';
                        echo '</div>';
                    }
                    
                    $cnn->close();
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'assets/include/footer.php'; ?>
