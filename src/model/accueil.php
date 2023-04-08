<?php
    session_start();
    require("../model/function/FonctionConnexion.php");
    require("../model/LesInfractions.php");
    require("../model/LesConducteurs.php");
    require("../model/LesDelits.php");
    if (isset($_GET["op"]) && $_GET["op"] === "deconnexion") {
        session_destroy();
        header("Location: authentification.php");
    }
    $delits = new LesDelits();
    $conducteur = new LesConducteurs();
    $conducteur->fetchConducteurByNoPermis($_SESSION['login']);
    $message = $conducteur->displayNomEtPrenomConducteur();
    $infraction = new LesInfractions();
    if (strtolower($_SESSION['login']) === "sudo") {
        $boutton = "<a href=\"../model/ajout.php?op=ajout\"><input type=\"submit\" id=\"SubmitAjout\" value=\"ajout\"></a>";
        $messageInfraction = "<h2>Voici la liste des infractions</h2>";
        $infraction->fetchAllInfraction();
    }
    else {
        $boutton = "";
        $messageInfraction = "<h2>Voici la liste des infractions que vous avez commises</h2>";
        $infraction->fetchInfractionByPermis($_SESSION['login']);
    }
    $tableau = $infraction->displayLesInfractionStockéesTableau(strtolower($_SESSION['login']));
    if(isset($_GET["op"]) && $_GET["op"] === "suppr") {
        $infraction->deleteInfraction($_GET["num"]);
        $delits->deleteLiaisonInfraDelit($_GET["num"]);
        header("Location: ./accueil.php");
    }

    include("../view/accueil.view.php");
?>