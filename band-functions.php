<?php 
function display_band($a){
    $current_band = $_GET["current_band"];

    switch($a){
        case "name":
            echo $current_band;
            break;
        case "banner":
            echo '<div class="band_banner" style="background: url(\'assets/img/banners/'.$current_band.'.jpg\')  no-repeat top/cover;"></div>';
            break;
        case "products":
            $cnn = new mysqli("localhost", "root", "", "sklep");
            $sql = "SELECT nazwa, zespol, cena, id FROM vinyls WHERE zespol='$current_band';"; 
            $results = $cnn->query($sql);
            while($row = $results->fetch_row()){
                echo '<a class="col-3 d-flex flex-column album-block" href="single_product.php?band_product='.$row[0].'">';
                echo "<img class='album-image' src='assets/img/albums/$row[1]/$row[0].jpg' alt='$row[1] - $row[0]'>";
                echo "<h4 class='text-uppercase'>$row[1]</h4>";
                echo "<p class='text-uppercase flex-fill'>$row[0]</p>";
                echo "<div class='d-flex justify-content-between flex-row'>";
                echo "<h5>£$row[2]</h5>";
                echo '<form method="post" action="add_to_cart.php">';
                echo '<input type="hidden" name="product_id" value="'.$row[3].'">'; 
                echo '<button type="submit" class="icon-plus" style="border: none; background: white; cursor: pointer;"></button>'; 
                echo '</form>';
                echo "</div>";
                echo "</a>";
            }
    }
    
}