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
            $delits[] = new Delits (
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
        $req = $dbo -> execSQL("SELECT DISTINCT d.id_delit, d.nature, d.montant FROM comprend c, delit d, infraction i WHERE c.id_inf = $id_inf AND c.id_delit = d.id_delit");
        unset($dbo);
        $delitsByInfraction = [];
        foreach($req as $delitsTab) {
            $delitsByInfraction[] = new Delits(
                $delitsTab["id_delit"],
                $delitsTab["nature"],
                $delitsTab["montant"]
            ); 
        };
        $this -> setDelitsTab($delitsByInfraction);
    }

    public function displayDelitsByInfraction(int $id_inf) {
        $tableauString = "";
        $tableauString = $tableauString . "<table>";
        $tableauString = $tableauString . "<thead>";
        $tableauString = $tableauString . "<th>Numéro du délit</th>";
        $tableauString = $tableauString . "<th>Nature du délit</th>";
        $tableauString = $tableauString . "<th>Montant du délit</th>";
        $tableauString = $tableauString . "</thead>";
        $tableauString = $tableauString . "</thead>";
        $tableauString = $tableauString . "</thead>";
        $tableauString = $tableauString . "</thead>";
    }

    public function displayMontantTotalByLesDelits(): int {
        $mémoireMontant = 0;
        foreach($this -> delitsTab as $récupMontant) {
            $mémoireMontant += $récupMontant -> getMontant();
        };
        return $mémoireMontant;
    }

    public function returnArrayDelitsNom(): array {
        $arrayDelit = [];
        foreach($this->delitsTab as $unDelit) {
            $arrayDelit[] = $unDelit->getNature();
        }
        return $arrayDelit;
    }

    public function returnArrayDelitsId(): array {
        $arrayDelit = [];
        foreach($this->delitsTab as $unDelit) {
            $arrayDelit[] = $unDelit->getIdDelit();
        }
        return $arrayDelit;
    }

    public function addLiaisonInfraDelit(array $checkDelit, string $idInfra) {
        $dbo = choixConnexion();
        foreach($checkDelit as $unDelit) {
            $dbo->execSQL("INSERT INTO comprend(id_inf, id_delit) VALUES (\"$idInfra\", $unDelit)");  
        }
        unset($dbo);
    }

    public function deleteLiaisonInfraDelit(string $id) {
        $dbo = choixConnexion();
        $dbo->execSQL("DELETE FROM comprend WHERE id_inf = \"$id\"");
        unset($dbo);
    }

    public function displayDelitsByNoPermis(string $NoPermis): string {
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT DISTINCT d.nature FROM delit d, infraction i, comprend c WHERE i.no_permis = \"$NoPermis\" AND d.id_delit = c.id_delit AND i.id_inf = c.id_inf");
        $arrayNatureDelit = [];
        foreach($req as $delits) {
            $arrayNatureDelit[] = "<br>";
            $arrayNatureDelit[] = "<li>".$delits['nature']."</li>";
        }
        return implode($arrayNatureDelit);
    }

    public function calculateurMontantTotal(int $getNum): int {
        $dbo = choixConnexion();
        $req = $dbo -> execSQL("SELECT DISTINCT d.montant FROM delit d, infraction i, comprend c WHERE i.id_inf = \"$getNum\" AND d.id_delit = c.id_delit AND i.id_inf = c.id_inf");
        $calculateur = 0;
        foreach($req as $unCalcul) {
            $calculateur += $unCalcul['montant'];
        }
        return $calculateur;
    }
}

?>