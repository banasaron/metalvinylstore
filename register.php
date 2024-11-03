<?php  include 'assets/include/header_login.php' ?>
<?php 
    session_start();
    if(isset($_SESSION["log"])){
        header("location:products.php");
        exit;
    }
?>
            <div class="col d-flex flex-column align-items-center posiiton-relative events-pointer">
                <div>
                    <h2 class="text-white">Zarejestruj się</h2>
                    <form action="" method="post" class="align-items-left">
                        <input type="text" placeholder="imie" size="25" name="imie">
                        <div class="w-100 mb-3"></div>
                        <input type="text" placeholder="nazwisko" size="25" name="nazwisko">
                        <div class="w-100 mb-3"></div>
                        <input type="text" placeholder="nazwa uzytkownika" size="25" name="login">
                        <div class="w-100 mb-3"></div>
                        <input type="email" placeholder="email" name="email">
                        <div class="w-100 mb-3"></div>
                        <input type="text" placeholder="(telefon)" name="telefon">
                        <div class="w-100 mb-3"></div>
                        <input type="password" placeholder="hasło" size="25" name="password">
                        <div class="w-100 mb-3"></div>
                        <input type="password" placeholder="powtórz hasło" size="25" name="repeat-password">
                        <div class="w-100 mb-3"></div>
                        <input type="submit" value="Rejestruj" class="btn btn-primary bg-black">
                    </form>
                    <p class="text-white">Masz juz konto? <a href="login.php" class="text-black">Zaloguj się</a></p>
                    <?php 
                        $cnn = new mysqli('localhost', 'root', '', 'sklep');
                        if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['telefon'])){
                            $imie = $_POST['imie'];
                            $nazwisko = $_POST['nazwisko'];
                            $login = $_POST['login'];
                            $haslo = $_POST['password'];
                            $email = $_POST['email'];
                            $telefon = $_POST['telefon'];
                            if(empty($imie) || empty($nazwisko) || empty($login) || empty($haslo) || empty($email)){
                                echo "<p style='color:red;'>wprowadz wszystkie dane!!!</p>";
                            }else{
                                $sql_check = "SELECT * FROM user WHERE login='$login'";
                                $result = $cnn->query($sql_check);
    
                                if ($result->num_rows > 0){
                                    echo "<p style='color:red;'>Użytkownik o takim loginie już istnieje, wybierz inny login.</p>";
                                } else {
                                    $sql = "INSERT INTO user(imie, nazwisko, login, password, email, telefon)VALUES('$imie', '$nazwisko', '$login', '$haslo', '$email', '$telefon')";
                                    if ($cnn->query($sql) === TRUE){
                                        echo "<p style='color:green;'>Rejestracja zakończona sukcesem.</p>";
                                    } else {
                                        echo "<p style='color:red;'>Błąd: " . $cnn->error . "</p>";
                                    }
                                }
                            }
                            
                        }
                        $cnn->close();
                        
                    ?>

                </div>
            </div>
            <div class="footer-circle position-absolute"></div>
        </div>    
    </div>
</body>
</html>