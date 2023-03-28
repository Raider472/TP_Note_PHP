<?php
    class Delits {

        private int $id_delit;
        private string $nature;
        private int $montant;

        function __construct($id_delit, $nature, $montant) {
            $this->id_delit = $id_delit;
            $this->nature = $nature;
            $this->montant = $montant;
        }

        function setIdDelit($id_delit) {
            $this->id_delit = $id_delit;
        }

        function getIdDelit() {
            return $this->id_delit;
        }

        function setNature($nature) {
            $this->nature = $nature;
        }

        function getNature() {
            return $this->nature;
        }

        function setmontant($montant) {
            $this->montant = $montant;
        }

        function getmontant() {
            return $this->montant;
        }
    }
?>