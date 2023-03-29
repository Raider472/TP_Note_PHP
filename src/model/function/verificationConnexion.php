<?php
    require("../model/LesConducteurs.php");

    function verificationConnexion(string $login, string $password): bool {
        $lesConducteurs = new LesConducteurs();
        if($lesConducteurs->fetchConducteurByLoginAndPassword($login, $password) === true) {
            return true;
        }
        else {
            return false;
        }
    }
?>