<?php
    session_start();
    require("../model/function/FonctionConnexion.php");
    require("../model/LesConducteurs.php");
    require("../model/LesInfractions.php");
    require("../model/LesDelits.php");
    $lesDelits = new LesDelits();
    $lesInfractions = new LesInfractions();
    $lesConducteurs = new LesConducteurs();

    require("../view/detail.view.php");
?>