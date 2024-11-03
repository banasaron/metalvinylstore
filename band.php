<?php include 'assets/include/header.php' 
?>

<div class="container-fluid">
    
    <div class="row justify-content-center">
        <div class="col-2 bg-black bands-list-main">
            <h2 class="text-uppercase text-white" id="bands-list-header">zespoły <span id="arrow">-</span></h2>
            <ul class="w-75" id="bands-list">
            <?php 
                $cnn = new mysqli('localhost', 'root', '', 'sklep');
                $sql = "SELECT id, zespol, COUNT(*) FROM vinyls GROUP BY zespol;";
                $result = $cnn->query($sql);
                while($row = $result->fetch_row()){
                    echo "<li class='band'><a href='band.php?current_band=$row[1]'>$row[1] ($row[2])</a></li>";
                }
            ?>
            </ul>
        </div>
        <div class="col-7 products">
            <div class="row flex-column">
                <div class="col flex-row d-flex justify-content-center">
                    <h2 class="font-weight-bold text-white text-uppercase"><?php require_once('band-functions.php'); display_band("name");?></h2>
                </div>
                <div class="col">
                    <div class="row justify-content-center mb-4">
                    <?php 
                            require_once('band-functions.php');
                            display_band("banner");
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="row flex-wrap d-flex">
                        <?php 
                            require_once('band-functions.php');
                            display_band("products");
                        ?>

                    </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>

<script src="assets/main.js"></script>
<?php include 'assets/include/footer.php' ?>