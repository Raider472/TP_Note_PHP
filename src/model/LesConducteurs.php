<?php
    require ("../controller/Conducteur.php");
    class LesConducteurs {
        private array $conducteursTab;

        public function getArrayTab() {
            return $this->conducteursTab;
        }

        public function setArrayTab($arrayTab) {
            $this->conducteursTab = $arrayTab;
        }

        public function fetchAllConducteur() {
            $dbo = choixConnexion();
            $requete = $dbo->execSQL("SELECT * FROM conducteur"); //Recupère tous les conducteurs de la table Conducteur de la base de données.
            unset($dbo);
            $conducteur = [];
            foreach($requete as $lesrequeteTab) { // Créer les conducteurs grâce à la classe Conducteur et les insèrent dans l'array $conducteur
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

        public function fetchConducteurByLoginAndPassword(string $login, string $password): bool {
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

        public function fetchConducteurByNoPermis(string $noPermis) {
            $dbo = choixConnexion();
            $requete = $dbo->execSQL("SELECT * FROM conducteur WHERE no_permis = \"$noPermis\"");
            unset($dbo);
            $conducteur = [];
            foreach($requete as $lesrequeteTab) { // Crée les conducteurs grâce à la classe Conducteur et recherche le conducteur correspondant avec son numéro de permis, puis insère le résultat dans l'array $conducteur
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

        public function displayAllConducteur() { // Pour afficher toutes les informations des conducteurs  
            foreach ($this->conducteursTab as $LesConducteurs) {
                echo "<p>" . $LesConducteurs->getNoPermis() . " | " . $LesConducteurs->getDatePermis() . " | " . $LesConducteurs->getNom() . " | " . $LesConducteurs->getPrenom() . " | " . $LesConducteurs->getMdp() . "</p>";
                echo "<br>";
            }
        }

        public function displayNomEtPrenomConducteur(): string {
            return $this->conducteursTab[0]->getNom() . " " . $this->conducteursTab[0]->getPrenom();
        }

        public function displayAllConducteurSelect(): string {
            $selectString = "<option value=\"\">Aucun</option>";

            foreach($this->conducteursTab as $unConducteur) {
                $selectString = $selectString . "<option value =\"";
                $selectString = $selectString . "select_permis[" . $unConducteur->getNoPermis() . "]";
                $selectString = $selectString . "\">";
                $selectString = $selectString . $unConducteur->getNoPermis();
                $selectString = $selectString . "</option>";
            }
            return $selectString;
        }

        public function returnArrayPermis(): array {
            $arrayPermis = [];
            foreach($this->conducteursTab as $unConducteur) {
                $arrayPermis[] = $unConducteur->getNoPermis();
            }
            return $arrayPermis;
        }
    }
?>