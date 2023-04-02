<?php
    class Infraction {
        
        private int $id_inf;
        private string $date_inf;
        private string $no_immat;
        private string | null $no_permis;

        public function __construct($id_inf, $date_inf, $no_immat, $no_permis) {
            $this->id_inf = $id_inf;
            $this->date_inf = $date_inf;
            $this->no_immat = $no_immat;
            if ($no_permis === null) {
                $this->no_permis = "";
            }
            else {
                $this->no_permis = $no_permis;
            }
        }

        public function setIdInf($id_inf) {
            $this->id_inf = $id_inf;
        }

        public function getIdInf() {
            return $this->id_inf;
        }

        public function setDateInf($date_inf) {
            $this->date_inf = $date_inf;
        }

        public function getDateInf() {
            return  $this->date_inf;
        }

        public function setNoImmat($no_immat) {
            $this->no_immat = $no_immat;
        }

        public function getNoImmat() {
            return $this->no_immat;
        }

        public function setNoPermis($no_permis) {
            $this->no_permis = $no_permis;
        }

        public function getNoPermis() {
            return $this->no_permis;
        }
    }
?>