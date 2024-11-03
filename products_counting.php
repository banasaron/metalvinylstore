<?php
    $sortBy = isset($_GET['sortBy']) ? $_GET['sortBy'] : 'nazwa ASC';
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $cnn = new mysqli('localhost', 'root', '', 'sklep');
    $sql_counting = "SELECT COUNT(*) as liczba FROM vinyls WHERE nazwa LIKE'%$search%' OR zespol LIKE '%$search%' ORDER BY $sortBy";
    $result = $cnn->query($sql_counting);
    $row_counting = $result->fetch_assoc();
    echo "<p class='text-white'>(ilość produktów: ".$row_counting['liczba'].")</p>";
    $cnn->close();

?>