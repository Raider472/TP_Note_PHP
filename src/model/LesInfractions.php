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
        $req = $dbo -> execSQL("SELECT * FROM infraction ORDER BY id_inf ASC");
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

    public function displayAllInfractions() { // Affiche toutes les infractions actuellement dans la base de données.
        foreach($this -> infractionsTab as $LesInfractions) {
            echo "<p>" . $LesInfractions -> getIdInf() . "|" . $LesInfractions -> getDateInf() . "|" . $LesInfractions -> getNoImmat() . "|" . $LesInfractions -> getNoPermis() . "</p>";
        }
    }

    public function fetchInfractionByPermis(string $noPermis) { // Récupère les infractions avec comme clé le numéro de permis.
        $dbo = choixConnexion();
        $requete = $dbo -> execSQL("SELECT DISTINCT id_inf, date_inf, i.no_immat, i.no_permis FROM infraction i, vehicule v WHERE (i.no_permis = \"$noPermis\") OR (v.no_permis = \"$noPermis\" AND i.no_immat = v.no_immat AND i.no_permis = '') ORDER BY id_inf ASC");
        unset($dbo);
        $infractions = [];
        foreach($requete as $lesrequeteTab) { // Crée les infractions grâce à la classe Infraction et les push dans l'array $infractions
            $infractions[] = new Infraction(
                $lesrequeteTab["id_inf"],
                $lesrequeteTab["date_inf"],
                $lesrequeteTab["no_immat"],
                $lesrequeteTab["no_permis"]
            );
        }
        $this->setInfractionsTab($infractions);
    }

    public function fetchInfractionById(int $id) {
        $dbo = choixConnexion();
        $requete = $dbo -> execSQL("SELECT * FROM infraction WHERE id_inf = $id");
        unset($dbo);
        $infractions = [];
        foreach($requete as $lesrequeteTab) { // Crée les infractions grâce à la classe Infraction et recherche l'infraction grâce à son ID, puis insère le résultat dans l'array $infractions
            $infractions[] = new Infraction(
                $lesrequeteTab["id_inf"],
                $lesrequeteTab["date_inf"],
                $lesrequeteTab["no_immat"],
                $lesrequeteTab["no_permis"]
            );
        }
        $this->setInfractionsTab($infractions);
    }

    public function displayLesInfractionStockéesTableau($identifiants): string {
        $tableauString = "";
        $tableauString = $tableauString . "<table>";
        $tableauString = $tableauString . "<thead>";
        $tableauString = $tableauString . "<th></th>";
        $tableauString = $tableauString . "<th>Numéro d'infraction</th>";
        $tableauString = $tableauString . "<th>Date d'infraction</th>";
        $tableauString = $tableauString . "<th>Véhicule</th>";
        $tableauString = $tableauString . "<th>Conducteur</th>";
        $tableauString = $tableauString . "<th>Montant total</th>";
        if ($identifiants === "sudo") {
            $tableauString = $tableauString . "<th></th>";
            $tableauString = $tableauString . "<th></th>";
        }
        $tableauString = $tableauString . "</thead>";
        $tableauString = $tableauString . "<tbody>";
        require_once("../model/LesDelits.php");
        $lesDelits = new LesDelits();
        foreach ($this->infractionsTab as $lesInfractions) {
            $lesDelits -> fetchDelitByInfraction($lesInfractions -> getIdInf());
            $tableauString = $tableauString . "<tr>";
            $tableauString = $tableauString . "<td>" . "<a href=\"../model/detail.php?num=" . urlencode($lesInfractions->getIdInf()) . "\"><img src=\"../view/assets/visu.png\"></a>" . "</td>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getIdInf() . "</td>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getDateInf() . "</td>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getNoImmat() . "</td>";
            $tableauString = $tableauString . "<td>" . $lesInfractions->getNoPermis() . "</td>";
            $tableauString = $tableauString . "<td>" . $lesDelits->displayMontantTotalByLesDelits() . "</td>";
            if ($identifiants === "sudo") {
                $tableauString = $tableauString . "<td>" . "<a href=\"../model/accueil.php?op=suppr&num=" . urlencode($lesInfractions->getIdInf()) . "\"><img src=\"../view/assets/corbeille.png\"></a>" . "</td>";
                $tableauString = $tableauString . "<td>" . "<a href=\"../model/ajout.php?op=modif&num=" . urlencode($lesInfractions->getIdInf()) . "\"><img src=\"../view/assets/modification.png\"></a>" . "</td>";
            }
            $tableauString = $tableauString . "</tr>";
        }
        $tableauString = $tableauString . "</tbody>";
        $tableauString = $tableauString . "</table>";
        return $tableauString;
    }

    public function getIncrementatiobIdInf(): int {
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT MAX(id_inf) FROM infraction");
        unset($dbo);
        $incrementation = 0;
        foreach($req as $increment) {
            $incrementation += $increment["MAX(id_inf)"];
        }
        return $incrementation + 1;
    }

    public function boolIdInfExiste(int $id): bool {
        $dbo = choixConnexion();
        $requete = $dbo->execSQL("SELECT * FROM infraction WHERE id_inf = $id");
        unset($dbo);
        if (count($requete) != 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function addNewInfraction(int $id, $date, string $NoPermis, string $NoImmat) {
        $dbo = choixConnexion();
        if ($NoPermis === "") {
            $dbo->execSQL("INSERT INTO infraction(id_inf, date_inf, no_immat, no_permis) VALUES ($id, \"$date\", \"$NoImmat\", \"\")");
        }
        else {
            $dbo->execSQL("INSERT INTO infraction(id_inf, date_inf, no_immat, no_permis) VALUES ($id, \"$date\", \"$NoImmat\", \"$NoPermis\")");
        }
        unset($dbo);
    }

    public function deleteInfraction(int $id) {
        $dbo = choixConnexion();
        $dbo->execSQL("DELETE FROM infraction WHERE id_inf = $id");
        unset($dbo);
    }

    public function updateInfraction(int $id, $date, string $noPermis, string $NoImmat) {
        $dbo = choixConnexion();
        $dbo->execSQL("UPDATE infraction SET date_inf = \"$date\", no_immat = \"$NoImmat\", no_permis = \"$noPermis\" WHERE id_inf = $id");
        unset($dbo);
    }
}
?>