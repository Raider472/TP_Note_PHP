<?php
    class Delits {

        private int $id_delit;
        private string $nature;
        private int $montant;

        public function __construct($id_delit, $nature, $montant) {
            $this->id_delit = $id_delit;
            $this->nature = $nature;
            $this->montant = $montant;
        }

        public function setIdDelit($id_delit) {
            $this->id_delit = $id_delit;
        }

        public function getIdDelit() {
            return $this->id_delit;
        }

        public function setNature($nature) {
            $this->nature = $nature;
        }

        public function getNature() {
            return $this->nature;
        }

        public function setMontant($montant) {
            $this->montant = $montant;
        }

        public function getMontant() {
            return $this->montant;
        }
    }
?>