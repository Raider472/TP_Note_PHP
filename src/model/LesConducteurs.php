<?php
    require ("../controller/Conducteur.php");
    require("../model/function/FonctionConnexion.php");
    class LesConducteurs {
        private array $conducteursTab;

        function getArrayTab() {
            return $this->conducteursTab;
        }

        function setArrayTab($arrayTab) {
            $this->conducteursTab = $arrayTab;
        }

        function fetchAllConducteur() {
            $dbo = choixConnexion();
            $requete = $dbo->execSQL("SELECT * FROM conducteur"); //Recupère tous les conducteur de la table Conducteur
            $conducteur = [];
            foreach($requete as $lesrequeteTab) { //Créer les conducteurs grâce à la classe conducteur et les push dans l'array $conducteur
                $conducteur[] = new Conducteur(
                    $lesrequeteTab["no_permis"],
                    $lesrequeteTab["date_permis"],
                    $lesrequeteTab["nom"],
                    $lesrequeteTab["prenom"],
                    $lesrequeteTab["mdp"]
                );
            }
            //echo $conducteur[1]->getMdp(); //Recupère et Affiche le mdp du deuxième conducteur
            $this->setArrayTab($conducteur);
        }

        function DisplayAllConducteur() { //Pour display tous les conducteurs avec leur informations 
            foreach ($this->conducteursTab as $LesConducteurs) {
                echo "<p>" . $LesConducteurs->getNoPermis() . " | " . $LesConducteurs->getDatePermis() . " | " . $LesConducteurs->getNom() . " | " . $LesConducteurs->getPrenom() . " | " . $LesConducteurs->getMdp() . "</p>";
                echo "<br>";
            }
        }
    }
?>