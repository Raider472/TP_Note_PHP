<?php
    require ("../controller/Conducteur.php");
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
            unset($dbo);
            $conducteur = [];
            foreach($requete as $lesrequeteTab) { //Créer les conducteurs grâce à la classe conducteur et les push dans l'array $conducteur
                $conducteur[] = new Conducteur(
                    $lesrequeteTab["no_permis"],
                    $lesrequeteTab["date_permis"],
                    $lesrequeteTab["nom"],
                    $lesrequeteTab["prenom"],
                    $lesrequeteTab["mdp_encrypter"]
                );
            }
            //echo $conducteur[1]->getMdp(); //Recupère et Affiche le mdp du deuxième conducteur
            $this->setArrayTab($conducteur);
        }

        function fetchConducteurByLoginAndPassword(string $login, string $password): bool {
            $dbo = choixConnexion();
            $requete = $dbo->execSQL("SELECT * FROM conducteur WHERE no_permis = \"$login\" AND mdp_encrypter = AES_ENCRYPT(\"$password\", \"mysecretkey\")");
            unset($dbo);
            if (count($requete) != 0) {
                return true;
            }
            else {
                return false;
            }
        }

        function fetchConducteurByNoPermis(string $noPermis) {
            $dbo = choixConnexion();
            $requete = $dbo->execSQL("SELECT * FROM conducteur WHERE no_permis = \"$noPermis\"");
            unset($dbo);
            $conducteur = [];
            foreach($requete as $lesrequeteTab) { //Créer les conducteurs grâce à la classe conducteur et les push dans l'array $conducteur
                $conducteur[] = new Conducteur(
                    $lesrequeteTab["no_permis"],
                    $lesrequeteTab["date_permis"],
                    $lesrequeteTab["nom"],
                    $lesrequeteTab["prenom"],
                    $lesrequeteTab["mdp_encrypter"]
                );
            }
            $this->setArrayTab($conducteur);
        }

        function displayAllConducteur() { //Pour display tous les conducteurs avec leur informations 
            foreach ($this->conducteursTab as $LesConducteurs) {
                echo "<p>" . $LesConducteurs->getNoPermis() . " | " . $LesConducteurs->getDatePermis() . " | " . $LesConducteurs->getNom() . " | " . $LesConducteurs->getPrenom() . " | " . $LesConducteurs->getMdp() . "</p>";
                echo "<br>";
            }
        }

        function displayNomEtPrenomConducteur(): string {
            return $this->conducteursTab[0]->getNom() . " " . $this->conducteursTab[0]->getPrenom();
        }
    }
?>