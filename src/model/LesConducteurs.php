<?php
    require ("../controller/Conducteur.php");
    require("../model/function/FonctionConnexion.php");
    class LesConducteurs {
        private array $conducteursTab;

        function getArrayTab() {
            return $this->conducteursTab;
        }

        function fetchAllConducteur() {
            $dbo = choixConnexion();
            $requete = $dbo->execSQL("SELECT * FROM conducteur");
            $conducteur = [];
            var_dump($requete);
        }
    }
?>