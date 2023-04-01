<?php
require("../controller/Infraction.php");

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
            unset($dbo);
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

    public function fetchInfractionByPermis(string $noPermis) { // Récupère les infractions avec comme clé le numéro de permis.
        $dbo = choixConnexion();
        $requete = $dbo -> execSQL("SELECT DISTINCT id_inf, date_inf, i.no_immat, i.no_permis FROM infraction i, vehicule v WHERE (i.no_permis = \"$noPermis\") OR (v.no_permis = \"$noPermis\" AND i.no_immat = v.no_immat AND i.no_permis = '')");
        unset($dbo);
        $infractions = [];
        foreach($requete as $lesrequeteTab) { //Créer les conducteurs grâce à la classe conducteur et les push dans l'array $conducteur
            $infractions[] = new Infraction(
                $lesrequeteTab["id_inf"],
                $lesrequeteTab["date_inf"],
                $lesrequeteTab["no_immat"],
                $lesrequeteTab["no_permis"]
            );
        }
        $this->setInfractionsTab($infractions);
    }

    public function displayLesInfractionStockéesTableau() {
        $tableauString = "";
        $tableauString = $tableauString . "<table>";
        $tableauString = $tableauString . "<thead>";
        $tableauString = $tableauString . "<th>Numéro d'infraction</th>";
        $tableauString = $tableauString . "<th>Date d'infraction</th>";
        $tableauString = $tableauString . "<th>Véhicule</th>";
        $tableauString = $tableauString . "<th>Conducteur</th>";
        $tableauString = $tableauString . "<th>Montant total</th>";
        $tableauString = $tableauString . "</thead>";
        $tableauString = $tableauString . "<tbody>";
        foreach ($this->infractionsTab as $lesInfractions) {
            $tableauString = $tableauString . "<tr>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getIdInf() . "</td>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getDateInf() . "</td>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getNoImmat() . "</td>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getNoPermis() . "</td>";
            //trouver un moyen d'afficher le prix sans faire du bricolage
            $tableauString = $tableauString . "</tr>";
        }
        $tableauString = $tableauString . "</tbody>";
        $tableauString = $tableauString . "</table>";
        return $tableauString;
    }
}

?>