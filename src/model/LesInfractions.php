<?php
require("../controller/Infraction.php");
require("../model/function/FonctionConnexion.php");

class LesInfractions {
    private array $infractionsTab;

    public function getInfractionsTab(): array {
        return $this -> infractionsTab;
    }

    public function setInfractionsTab(array $tab) {
        $this -> infractionsTab = $tab;
    }

    public function fetchAllInfraction() { // Récupère toutes les infractions actuellement dans la base de données.
            $dbo = choixConnexion();
            $req = $dbo -> execSQL("SELECT * FROM infraction");
            $infractions = [];
            foreach($req as $lesReqs) {
                $infractions[] = new Infraction(
                    $lesReqs["id_inf"],
                    $lesReqs["date_inf"],
                    $lesReqs["no_immat"],
                    $lesReqs["no_permis"]
                );
            }
            $this -> setInfractionsTab($infractions);
        }

    public function displayAllInfractions() { // Affiche les toutes les infractions actuellement dans la base de données.
        foreach($this -> infractionsTab as $LesInfractions) {
            echo "<p>" . $LesInfractions -> getIdInf . $LesInfractions -> getDateInf . $LesInfractions -> getNoImmat . $LesInfractions -> getNoPermis . "</p>";
        }
    }

    public function fetchInfractionByPermis($noPermis) { // Récupère les infractions avec comme clé le numéro de permis.
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT DISTINCT id_inf, date_inf, i.no_immat, i.no_permis FROM infraction i, vehicule v WHERE (i.no_permis = $noPermis) OR (v.no_permis = $noPermis AND i.no_immat = v.no_immat AND i.no_permis = ''");
    }

    public function displayInfractionByPermis() {
        $req = $this -> fetchInfractionByPermis();
        foreach($req as $clé) {

        };
    }
}

?>