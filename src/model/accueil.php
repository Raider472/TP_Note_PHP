<?php
    session_start();
    require("../model/function/FonctionConnexion.php");
    require("../model/LesInfractions.php");
    require("../model/LesConducteurs.php");
    require("../model/LesDelits.php");
    $delits = new LesDelits();
    $conducteur = new LesConducteurs();
    $conducteur->fetchConducteurByNoPermis($_SESSION['login']);
    $message = $conducteur->displayNomEtPrenomConducteur();
    $infraction = new LesInfractions();
    $infraction->fetchInfractionByPermis($_SESSION['login']);
    $tableau = $infraction->displayLesInfractionStockéesTableau();

    if(isset($_GET["op"]) && $_GET["op"] === "suppr") {
        $infraction->deleteInfraction($_GET["num"]);
        $delits->deleteLiaisonInfraDelit($_GET["num"]);
        header("Location: ./accueil.php");
    }

    include("../view/accueil.view.php");
?>