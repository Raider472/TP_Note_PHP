<?php
    session_start();
    require_once("../model/LesConducteurs.php");
    require_once("../model/function/FonctionConnexion.php");
    $inputId = "";
    $dateInput = "";
    include("../view/ajout.view.php");
?>