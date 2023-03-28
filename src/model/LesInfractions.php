<?php
require("../controller/Infractions.php");
require("../model/function/FonctionConnexion.php");

class LesInfractions {
    private array $infractionsTab;

    public function getInfractionsTab(): array {
        return $this -> infractionsTab;
    }

    public function fetchInfractionByPermis() {
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT id_inf, no_permis FROM infraction i, conducteur c WHERE i.no_permis=c.no_permis");
    }
}

?>