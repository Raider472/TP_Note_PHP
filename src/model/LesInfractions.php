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

    public function fetchInfractionByPermis() { // Récupère les infractions avec comme clé le numéro de permis.
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT id_inf, date_inf, no_immat, no_permis FROM infraction i, conducteur c WHERE i.no_permis=c.no_permis");
        foreach($req as $clé) {
            echo "<table> <th> <tr>".$clé["no_permis"].$clé["ind_inf"].$clé["date_inf"].$clé["no_immat"]."</tr> </th> </table>" ;
        }
    }
}

?>