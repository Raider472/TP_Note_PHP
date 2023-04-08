<?php
    session_start();
    require("../model/function/FonctionConnexion.php");
    require("../model/LesConducteurs.php");
    require("../model/LesInfractions.php");
    require("../model/LesDelits.php");
    require("../model/LesVéhicules.php");
    
    $lesDelits = new LesDelits();
    $lesInfractions = new LesInfractions();
    $lesConducteurs = new LesConducteurs();
    $lesVehicules = new LesVéhicules();

    $lesConducteurs->fetchAllConducteur();
    $lesVehicules->fetchAllVehicules();
    $lesDelits->fetchAllDelits();
    $lesInfractions->fetchAllInfraction();
    $numInfraction = $lesInfractions -> displayIdInfractionByNoPermis($_SESSION['login'], $_GET['num']);

    $utilisateurNom = $lesConducteurs -> displayNomEtPrenomConducteur();
    $afficherDetail = $lesInfractions -> displayLesInfractionStockéesTableau($_SESSION['login']);
    $dateInfraction = $lesInfractions -> displayDateByNoPermis($_SESSION['login']);
    $userImmat = $lesVehicules -> displayImmatByNoPermis($_SESSION['login']);
    $marqueVehicule = $lesVehicules -> displayMarqueByNoPermis($_SESSION['login']);
    $modeleVehicule = $lesVehicules -> displayModeleByNoPermis($_SESSION['login']);
    $detailsDelits = $lesDelits -> displayDelitsByNoPermis($_SESSION['login']);
    $montantTotal = $lesDelits -> calculateurMontantTotal($_GET['num']);

    if (isset($_GET['input']) && $_GET['input'] == 'Retour') {
        header("Location: ./accueil.php");
    };

    require("../view/detail.view.php");
?>
