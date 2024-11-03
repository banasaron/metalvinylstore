<?php include 'assets/include/header.php';?>
<div class="container-fluid">
    
    <div class="row justify-content-center">
        
        <div class="col-7 bg-sort">
            <div class="row m-3 mt-5 mb-5 text-white justify-content-center">
            <h3 class="text-center">Witaj w panelu użytkownika!</h3>
                <div class="col-4">
                    <div class="row flex-column">
                        <div class="col">
                            <h4><a href="user_panel.php?current_section=edit">edytuj dane</a></h4>
                            <hr>
                        </div>
                        <div class="col">
                            <h4><a href="user_panel.php?current_section=shipping">dane wysylkowe</a></h4>
                            <hr>
                        </div>
                        <div class="col">
                            <h4><a href="user_panel.php?current_section=password">zmien haslo</a></h4>
                            <hr>
                        </div>
                        <div class="col">
                            <h3><a class="text-white" href="logout.php">wyloguj<i class="icon-logout"></i></a></h3>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-3 flex-fill">
                    
                    <?php 
                    
                    $cnn = new mysqli('localhost', 'root', '', 'sklep');
                    $current_user = $_SESSION['log'];
                    $sql = "SELECT imie, nazwisko, login, email, telefon, password, kod_pocztowy, miejscowosc, ulica, nr_domu_lokalu FROM user WHERE login='$current_user';";
                    $result = $cnn->query($sql);
                    $row = $result->fetch_row();
                    if(isset($_GET['current_section'])){
                        
                        
                        
                        $current_section = $_GET['current_section'];
                        
                        switch($current_section){
                            case "edit":
                                echo 'Edytuj dane';
                                echo '<div class="col-4 d-flex flex-column">';
                                    echo '<form method="POST" id="noChangeForm">';
                                        echo "<input type='text' name='imie' value='$row[0]'>";
                                        echo "<input type='text' name='nazwisko' value='$row[1]'>";
                                        echo "<input type='text' name='login' value='$row[2]' disabled>";
                                        echo "<input type='email' name='email' value='$row[3]'>";
                                        echo "<input type='text' name='telefon' value='$row[4]'>";
                                        echo "<input type='submit' value='ZAKTUALIZUJ'>";
                                    echo '</form>';
                                echo "</div>";
                                break;
                            case "shipping":
                                //echo $current_section;
                                echo 'Dane wysyłkowe';
                                echo '<div class="col-4 d-flex flex-column">';
                                    echo '<form method="POST" id="noChangeForm">';
                                            echo "<input type='text' name='kod_pocztowy' maxlength=6 placeholder='kod pocztowy' value='$row[6]'>";
                                            echo "<input type='text' name='miejscowosc' placeholder='miejscowość' value='$row[7]'>";
                                            echo "<input type='text' name='ulica' placeholder='ulica' value='$row[8]'>";
                                            echo "<input type='text' name='nr_domu_lokalu' maxlength=7 placeholder='numer domu/lokalu' value='$row[9]'>";
                                            echo "<input type='submit' value='ZAKTUALIZUJ'>";
                                        echo '</form>';
                                echo "</div>";
                                break;
                            case "password":
                                echo 'Zmiana hasla';
                                echo '<div class="col-4 d-flex flex-column">';
                                    echo '<form method="POST" id="noChangeForm">';
                                        echo "<div><input type='password' name='stare_haslo' placeholder='stare haslo'><i class='icon-eye-off'></i></div>";
                                        echo "<div><input type='password' name='nowe_haslo' placeholder='nowe haslo'><i class='icon-eye-off'></i></div>";
                                        echo "<div><input type='password' name='powtorz_haslo' placeholder='powtorz haslo'><i class='icon-eye-off'></i></div>";
                                        echo "<input type='submit' value='ZAKTUALIZUJ'>";
                                    echo '</form>';
                                echo "</div>";
                                break;
                        }

                    }else{
                        echo "strona glowa";
                    }

                    if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['email'])&& isset($_POST['telefon'])){
                        $imie = $_POST['imie'];
                        $nazwisko = $_POST['nazwisko'];
                        
                        $email = $_POST['email'];
                        $telefon = $_POST['telefon'];
                        $sql = "UPDATE user SET imie='$imie', nazwisko='$nazwisko', email='$email', telefon='$telefon' WHERE login='$current_user'";
                        /*if(*/$result = $cnn->query($sql);/*===TRUE){
                            echo "pomyslnie update wykonano";
                        }*/
                    }
                    if(isset($_POST['stare_haslo']) && isset($_POST['nowe_haslo']) && isset($_POST['powtorz_haslo'])){
                        $aktualne_haslo = $row[5];
                        $stare_haslo = $_POST['stare_haslo'];
                        $nowe_haslo = $_POST['nowe_haslo'];
                        $powtorz_haslo = $_POST['powtorz_haslo'];

                        if(empty($stare_haslo) || empty($nowe_haslo) || empty($powtorz_haslo)){
                            echo "<p>wprowadz prawidlowe dane!!</p>";
                        }else{
                            if($stare_haslo == $aktualne_haslo){
                                if($nowe_haslo == $powtorz_haslo){
                                    //prawidlowo wszystko
                                    $sql = "UPDATE user SET password='$nowe_haslo' WHERE login='$current_user'";
                                    if($result = $cnn->query($sql)===TRUE){
                                        echo "<p>pomyslnie zaktualizowano haslo</p>";
                                    }
                                }else{
                                    echo "<p>podane hasla sie roznia!!</p>";
                                }
                                
                            }else{
                                echo "<p>aktualne haslo jest inne!!</p>";
                            }
                        }

                        
                    }
                    if(isset($_POST['kod_pocztowy']) && isset($_POST['miejscowosc']) && isset($_POST['ulica']) && isset($_POST['nr_domu_lokalu'])){
                        $kod_pocztowy = $_POST['kod_pocztowy'];
                        $miejscowosc = $_POST['miejscowosc'];
                        $ulica = $_POST['ulica'];
                        $nr_domu_lokalu = $_POST['nr_domu_lokalu'];
                        $errors = false;  

                        if(!preg_match("/^\d{2}-\d{3}$/", $kod_pocztowy)){
                            echo "<p>podano zly kod pocztowy</p>";
                            $errors = true;
                            
                        }
                        if(!preg_match("/^\d+[A-Za-z]?(\/\d+[A-Za-z]?)?$/", $nr_domu_lokalu)){
                            echo "<p>podano zly numer domu badz lokalu</p>";
                            $errors = true;
                            
                        }
                        if(!$errors){
                            
                            $sql = "UPDATE user SET kod_pocztowy='$kod_pocztowy', miejscowosc='$miejscowosc', ulica='$ulica', nr_domu_lokalu='$nr_domu_lokalu' WHERE login='$current_user'";
                            if($result = $cnn->query($sql)===TRUE){
                                echo "<p>pomyslnie zaktualizowano dane wysylkowe!!!</p>";
                            }
                        }

                        
                        
                    }

                    
                    $cnn->close();
                    
                        
                    
                    
                    
                
                    ?>
                </div>
                
                
            </div>
        </div>
        
    </div>
</div>
<script>
    function submitForm(){document.getElementById("sortForm").submit()};
</script>
<script defer>
    const form = document.querySelector("#noChangeForm");
    if(form){
        let isFormChanged = false;
        console.log(form);

        form.addEventListener("input", ()=>{
            isFormChanged = true;
            //console.log("zmieniono");
        });
        form.addEventListener('submit', ()=>{
            isFormChanged = false;
        });

        window.addEventListener("beforeunload", (event) => {
            if (isFormChanged) event.preventDefault(); 
            
        });
    }
    
</script>



<?php include 'assets/include/footer.php'; ?>