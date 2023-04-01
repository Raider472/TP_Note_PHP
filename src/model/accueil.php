<?php
    session_start();
    require("../model/function/FonctionConnexion.php");
    require("../model/LesInfractions.php");
    require("../model/LesConducteurs.php");
    $conducteur = new LesConducteurs();
    $conducteur->fetchConducteurByNoPermis($_SESSION['login']);
    $message = $conducteur->displayNomEtPrenomConducteur();
    $infraction = new LesInfractions();
    $infraction->fetchInfractionByPermis($_SESSION['login']);
    $tableau = $infraction->displayLesInfractionStockéesTableau();
    include("../view/accueil.view.php");
?>