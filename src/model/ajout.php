<?php
    session_start();
    require_once("../model/LesConducteurs.php");
    require_once("../model/LesInfractions.php");
    require_once("../model/function/FonctionConnexion.php");
    $lesInfractions = new LesInfractions();
    $lesInfractions->fetchInfractionByPermis("az67");
    $inputId = $lesInfractions->getIncrementatiobIdInf();
    $dateInput = "";
    include("../view/ajout.view.php");
?>