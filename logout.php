<?php
session_start();
if (isset($_SESSION['log'])){
    unset($_SESSION['log']);
}
header('location:login.php');
session_destroy();