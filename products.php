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
            <div class="row flex-column ">
                <div class="col flex-row d-flex justify-content-start bg-sort">
                    <h2 class="font-weight-bold text-white">Plyty vinylowe</h2>
                    <?php 
                        include('products_counting.php');
                        
                    ?>

                </div>
                <div class="col bg-sort">
                    <div class="row">
                        <div class="col text-white d-flex flex-row">
                            <span>Sortuj</span>
                            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="sortForm" class="d-flex w-100 justify-content-between">
                                
                                <select name="sortBy" onchange="submitForm();">
                                    <option value="nazwa ASC"<?php if (isset($_GET['sortBy']) && $sortBy == 'nazwa ASC') echo 'selected'; ?>>po nazwie rosnąco</option>
                                    <option value="nazwa DESC"<?php if (isset($_GET['sortBy']) && $sortBy == 'nazwa DESC') echo 'selected'; ?>>po nazwie malejąco</option>
                                    <option value="cena ASC"<?php if (isset($_GET['sortBy']) && $sortBy == 'cena ASC') echo 'selected'; ?>>po cenie rosnąco</option>
                                    <option value="cena DESC"<?php if (isset($_GET['sortBy']) && $sortBy == 'cena DESC') echo 'selected'; ?>>po cenie malejąco</option>
                                    <option value="rok_wydania ASC"<?php if (isset($_GET['sortBy']) && $sortBy == 'rok_wydania ASC') echo 'selected'; ?>>po dacie rosnąco</option>
                                    <option value="rok_wydania DESC"<?php if (isset($_GET['sortBy']) && $sortBy == 'rok_wydania DESC') echo 'selected'; ?>>po dacie malejąco</option>
                                </select>
                                <input type="search" placeholder="Wyszukaj album lub zespół..." size="60" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                <select name="limit" onchange="submitForm();">
                                    <option value="32"<?php if (isset($_GET['limit']) && intval($_GET['limit']) == 32) echo 'selected'; ?>>32</option>
                                    <option value="64"<?php if (isset($_GET['limit']) && intval($_GET['limit']) == 64) echo 'selected'; ?>>64</option>
                                    <option value="128"<?php if (isset($_GET['limit']) && intval($_GET['limit']) == 128) echo 'selected'; ?>>128</option>
                                    <option value="256"<?php if (isset($_GET['limit']) && intval($_GET['limit']) == 256) echo 'selected'; ?>>256</option>
                                </select>
                            </form>
                        </div>
                        
                    </div>
                </div>
                <div class="col">
                           
                    <div class="row flex-wrap d-flex">

                        <?php 
                            include('products_sort_searching.php');
                        ?> 
                        
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>




<script src="assets/main.js"></script>
<?php include 'assets/include/footer.php' ?>
