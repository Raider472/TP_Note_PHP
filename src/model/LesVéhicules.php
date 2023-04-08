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

        public function fetchVehiculesByNoImmat(string $noImmat) {
            $dbo = choixConnexion();
            $req = $dbo -> execSQL("SELECT * FROM vehicule WHERE no_immat = \"$noImmat\"");
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
    }
?>