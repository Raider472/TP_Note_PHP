<?php
    session_start();
    require_once("../model/LesConducteurs.php");
    require_once("../model/LesInfractions.php");
    require_once("../model/LesVéhicules.php");
    require_once("../model/LesDelits.php");
    require_once("../model/function/FonctionConnexion.php");
    function validateDate($date, $format = 'Y-m-d'){ // Fonction qui verifie si la date est valide.
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    $lesInfractions = new LesInfractions();
    $lesConducteurs = new LesConducteurs();
    $lesVehicules = new LesVéhicules();
    $lesDelits = new LesDelits();
    $lesConducteurs->fetchAllConducteur();
    $lesVehicules->fetchAllVehicules();
    $lesDelits->fetchAllDelits();

    $lesPermis = $lesConducteurs->returnArrayPermis();
    $lesImmats = $lesVehicules->returnArrayImmats();
    $messageErreur = "";
    $attributInput = "";

    if (isset($_GET["op"]) && $_GET["op"] === "ajout") {
        $nomPage = "Ajout";
        $inputId = (isset($_POST["input_idInf"])?$_POST["input_idInf"]: null);
        $dateInput = (isset($_POST["input_dateInf"])?$_POST["input_dateInf"]: date("Y-m-d"));
        $selectPermis = (isset($_POST["select_permis"])?$_POST["select_permis"]: null);
        $selectVoiture = (isset($_POST["select_voiture"])?$_POST["select_voiture"]: null);
        $checkDelit = (isset($_POST["check_delit"])?$_POST["check_delit"]: null);
        if (!isset($_POST["input_idInf"])) {
            $inputId = $lesInfractions->getIncrementatiobIdInf();
        }
    }
    else if(isset($_GET["op"]) && $_GET["op"] === "modif") {
        $nomPage = "Modification";
        $attributInput= "readonly";
        $inputId = $_GET["num"];
        $uneInfraction = new LesInfractions();
        $uneInfraction->fetchInfractionById($_GET["num"]);
        $unDelit = new LesDelits();
        $unDelit->fetchDelitByInfraction($_GET["num"]);
        $dateInput = (isset($_POST["input_dateInf"])?$_POST["input_dateInf"]: date($uneInfraction->getInfractionsTab()[0]->getDateInf()));
        $selectPermis = ((isset($_POST["select_permis"])?$_POST["select_permis"]: $uneInfraction->getInfractionsTab()[0]->getNoPermis()));
        $selectVoiture = (isset($_POST["select_voiture"])?$_POST["select_voiture"]: $uneInfraction->getInfractionsTab()[0]->getNoImmat());
        $checkDelit = (isset($_POST["check_delit"])?$_POST["check_delit"]: $unDelit->returnArrayDelitsId());
    }

    if (isset($_POST["input_idInf"]) && isset($_POST["input_dateInf"]) && isset($_POST["select_voiture"])) {
        $verification = true;
        if($lesInfractions->boolIdInfExiste((int)$inputId) === true && $_GET["op"] != "modif") {
            $messageErreur .= "L'id d'infraction existe deja <br>";
            $verification = false;
        }
        else if ($inputId === "") {
            $messageErreur .= "Veulliez remplir le champ de l'id <br>";
            $verification = false;
        }
        else if(is_numeric($inputId) === false) {
            $messageErreur .= "L'id n'est pas un nombre <br>";
            $verification = false;
        }
        if(validateDate($dateInput) === false) {
            $messageErreur .= "La date n'est pas valide <br>";
            $verification = false;
        }
        if ($selectVoiture === "") {
            $messageErreur .= "Veulliez selectionner une voiture <br>";
            $verification = false;
        }
        if ($checkDelit === null || !isset($_POST["check_delit"])) {
            $messageErreur .= "Veulliez selectionner au moins un délit <br>";
            $verification = false;
        }
        if ($verification === true) {
            if (isset($_GET["op"]) && $_GET["op"] === "ajout") {
                $lesInfractions->addNewInfraction($inputId, $dateInput, $selectPermis, $selectVoiture);
                $lesDelits->addLiaisonInfraDelit($checkDelit, $inputId);
                header("Location: ./accueil.php");
            }
            else if (isset($_GET["op"]) && $_GET["op"] === "modif") {
                $lesInfractions->updateInfraction($inputId, $dateInput, $selectPermis, $selectVoiture);
                $lesDelits->deleteLiaisonInfraDelit($inputId);
                $lesDelits->addLiaisonInfraDelit($checkDelit, $inputId);
                header("Location: ./accueil.php");
            }
        }
    }
    include("../view/ajout.view.php");
?>