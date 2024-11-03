<?php include 'assets/include/header_login.php' ?>
<?php 
    session_start();
    if(isset($_SESSION["log"])){
        header("location:products.php");
        exit;
    }elseif (isset($_POST['login']) && isset($_POST['password'])){
        $login_form = $_POST["login"];
        $password_form = $_POST["password"];

        $cnn = new mysqli('localhost', 'root', '', 'sklep');
        $sql="SELECT id, login, password FROM user WHERE login='$login_form';";

        $results=$cnn->query($sql);
        if($results->num_rows > 0){
            $row = $results->fetch_row();
            if ($login_form==$row[1] && $password_form==$row[2]){
                $current_date = date("Y/m/d h:i:sa");
                $_SESSION['log']=$login_form;
                $sql_session = "INSERT INTO login_sessions(id_user, login, data_sesji) VALUES('$row[0]', '$row[1]', '$current_date')";
                $cnn->query($sql_session);
                header('location:products.php');
                exit();
            }else{
                echo "nieprawidlowy login lub haslo";
            }
        }else{
            echo "nieprawidlowy login lub haslo";
        }
        
        
        
    }

?>

            <div class="col d-flex flex-column align-items-center posiiton-relative events-pointer">
                <div>
                    <h3 class="text-white">Zaloguj się</h3>
                    <form action="" method="post">
                        <input type="text" placeholder="login" name="login">
                        <div class="w-100 mb-3"></div>
                        <input type="password" placeholder="hasło" name="password">
                        <div class="w-100 mb-3"></div>
                        <input type="submit" value="Loguj" class="btn btn-primary bg-black">
                        
                    </form>
                    <p class="text-white">Nie masz konta? <a href="register.php" class="text-black">Zarejestruj się</a></p>
                </div>
            </div>
            <div class="footer-circle position-absolute"></div>
        </div>
    </div>
<?php include 'assets/include/footer_login_register.php' ?>