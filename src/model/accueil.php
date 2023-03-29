<?php
    session_start();
    $message = $_SESSION['login'];
    include("../view/accueil.view.php");
?>