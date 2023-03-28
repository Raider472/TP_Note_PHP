<?php
    class Infraction {
        
        private int $id_inf;
        private string $date_inf;
        private string $no_immat;
        private string $no_permis;

        function __construct($id_inf, $date_inf, $no_immat, $no_permis) {
            $this->id_inf = $id_inf;
            $this->date_inf = $date_inf;
            $this->no_immat = $no_immat;
            $this->no_permis = $no_permis;
        }

        function setIdInf($id_inf) {
            $this->id_inf = $id_inf;
        }

        function getIdInf() {
            return $this->id_inf;
        }

        function setDateInf($date_inf) {
            $this->date_inf = $date_inf;
        }

        function getDateInf() {
            return  $this->date_inf;
        }

        function setNoImmat($no_immat) {
            $this->no_immat = $no_immat;
        }

        function getNoImmat() {
            return $this->no_immat;
        }

        function setNoPermis($no_permis) {
            $this->no_permis = $no_permis;
        }

        function getNoPermis() {
            return $this->no_permis;
        }
    }
?>