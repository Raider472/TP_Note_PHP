<?php
require("../controller/Delits.php");

class LesDelits {
    private array $delitsTab;

    public function getDelitsTab(): array {
        return $this -> delitsTab;
    }

    public function setDelitsTab(array $value) {
        $this -> delitsTab = $value;
    }

    public function fetchAllDelits() {
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT * FROM delit");
        unset($dbo);
        $delits = [];
        foreach($req as $lesDelits) {
            $delits = new Delits (
            $lesDelits["id_delit"],
            $lesDelits["nature"],
            $lesDelits["montant"]
            );
        }
        $this -> setDelitsTab($delits);
    }

    public function displayAllDelits() {
        foreach($this -> delitsTab as $lesDelits) {
            echo "<p>". $lesDelits -> getIdDelit() . "|" . $lesDelits -> getNature() . "|" . $lesDelits -> getMontant() ."</p>";
        }
    }

    public function fetchDelitByInfraction(int $id_inf) {
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT DISTINCT d.id_delit, d.nature, d.montant FROM comprend c, delit d, infraction i WHERE c.id_inf = \"$id_inf\" AND c.id_delit = d.id_delit");
        unset($dbo);
        $delitsByInfraction = [];
        foreach($req as $delitsTab) {
            $delitsByInfraction = new Delits(
                $delitsTab["id_delit"],
                $delitsTab["nature"],
                $delitsTab["montant"]
            ); 
        };
        $this -> setDelitsTab($delitsByInfraction);
    }
}

?>