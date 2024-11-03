<?php 

    $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'nazwa'; 
    $search = isset($_GET['search']) ? $_GET['search'] : ''; 
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 32; 

    $cnn = new mysqli('localhost', 'root', '', 'sklep');
    $searchSafe = $cnn->real_escape_string($search);
    $sql = "SELECT nazwa, zespol, cena, id FROM vinyls WHERE (nazwa LIKE'%$searchSafe%' OR zespol LIKE '%$searchSafe%') ORDER BY $sortBy LIMIT $limit;";
    
    $result = $cnn->query($sql);
    if($result && $result->num_rows > 0){
        while($row = $result->fetch_row()){
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
    }else{
        echo '<div class="row justify-content-center text-center p-5"><h1 class="text-danger">NIE ZNALEZIONO PRODUKTÓW...</h1></div>';
    }
   
    

    $cnn->close();



?>