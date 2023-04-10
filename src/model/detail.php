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

    if (strtolower($_SESSION['login']) === "sudo") {
        $utilisateurNom = "voici le détail de l'infraction";
    }
    else {
        $lesConducteurs->fetchConducteurByNoPermis($_SESSION['login']);
        $utilisateurNom = $lesConducteurs -> displayNomEtPrenomConducteur() . " , voici le détail de l'infraction que vous avez commise :";
    }
    $lesDelits->fetchDelitByInfraction($_GET['num']);
    $lesInfractions->fetchInfractionById($_GET['num']);
    $lesVehicules->fetchVehiculesByNoImmat($lesInfractions->getInfractionsTab()[0]->getNoImmat());

    $numInfraction = $_GET['num'];
    $dateInfraction = $lesInfractions -> getInfractionsTab()[0]->getDateInf();
    $userImmat = $lesVehicules -> getVehiculeTab()[0]->getNoImmat();
    $marqueVehicule = $lesVehicules -> getVehiculeTab()[0]->getMarque();
    $modeleVehicule = $lesVehicules -> getVehiculeTab()[0]->getModele();

    $detailsDelits = $lesDelits -> displayDelitsByNoPermis();
    $montantTotal = $lesDelits -> displayMontantTotalByLesDelits();

    require("../view/detail.view.php");
?>
