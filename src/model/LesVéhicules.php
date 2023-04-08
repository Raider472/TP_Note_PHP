<?php
    require("../controller/Véhicule.php");
    class LesVéhicules {
        private array $vehiculeTab;

        public function getVehiculeTab() {
            return $this->vehiculeTab;
        }

        public function setVehiculeTab($vehiculeTab) {
            $this->vehiculeTab = $vehiculeTab;
        }

        public function fetchAllVehicules() {
            $dbo = choixConnexion();
            $req = $dbo -> execSQL("SELECT * FROM vehicule");
            unset($dbo);
            $vehicules = [];
            foreach($req as $lesVehics) {
                $vehicules[] = new Véhicule(
                    $lesVehics["no_immat"],
                    $lesVehics["date_immat"],
                    $lesVehics["modele"],
                    $lesVehics["marque"],
                    $lesVehics["no_permis"]
                );
            }
            $this -> setVehiculeTab($vehicules);
        }

        public function displayAllVehiculeSelect(): string {
            $selectString = "<option value=\"\"></option>";

            foreach($this->vehiculeTab as $unVehicule) {
                $selectString = $selectString . "<option value =\"";
                $selectString = $selectString . $unVehicule->getNoImmat();
                $selectString = $selectString . "\">";
                $selectString = $selectString . $unVehicule->getNoImmat();
                $selectString = $selectString . "</option>";
            }
            return $selectString;
        }

        public function displayMarqueByNoPermis(string $NoPermis): string {
            $dbo = choixConnexion();
            $req = $dbo -> execSQL("SELECT marque FROM vehicule WHERE no_permis = \"$NoPermis\"");
            unset($dbo);
            $arrayMarque = [];
            foreach($req as $uneMarque) {
                $arrayMarque[] = $uneMarque['marque']; 
            }
            return implode($arrayMarque);
        }

        public function displayModeleByNoPermis(string $NoPermis): string {
            $dbo = choixConnexion();
            $req = $dbo -> execSQL("SELECT modele FROM vehicule WHERE no_permis = \"$NoPermis\"");
            unset($dbo);
            $arrayModele = [];
            foreach($req as $unModele) {
                $arrayModele[] = $unModele['modele']; 
            }
            return implode($arrayModele);
        }

        public function displayImmatByNoPermis(string $NoPermis): string {
            $dbo = choixConnexion();
            $req = $dbo -> execSQL("SELECT no_immat FROM vehicule WHERE no_permis = \"$NoPermis\"");
            unset($dbo);
            $arrayImmat = [];
            foreach($req as $uneImmat) {
                $arrayImmat[] = $uneImmat['no_immat']; 
            }
            return implode($arrayImmat);
        }

        public function returnArrayImmats(): array {
            $arrayImmat = [];
            foreach($this->vehiculeTab as $unVéhicule) {
                $arrayImmat[] = $unVéhicule->getNoImmat();
            }
            return $arrayImmat;
        }
    }
?>