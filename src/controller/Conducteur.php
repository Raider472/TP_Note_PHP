<?php
    class Conducteur {

        private string $no_permis;
        private string $date_permis;
        private string $nom;
        private string $prenom;
        private string $mdp;

        public function __construct($no_permis, $date_permis, $nom, $prenom, $mdp) {
            $this->no_permis = $no_permis;
            $this->date_permis = $date_permis;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mdp = $mdp;
        }

        public function setNoPermis($no_permis) {
            $this->no_permis = $no_permis;
        }

        public function getNoPermis() {
            return $this->no_permis;
        }

        public function setDatePermis($date_permis) {
            $this->date_permis = $date_permis;
        }

        public function getDatePermis() {
            return $this->date_permis;
        }

        public function setNom($nom) {
            $this->nom = $nom;
        }
        
        public function getNom() {
            return $this->nom;
        }

        public function setPrenom($prenom) {
            $this->prenom = $prenom;
        }

        public function getPrenom() {
            return $this->prenom;
        }

        public function setMdp($mdp) {
            $this->mdp = $mdp;
        }

        public function getMdp() {
            return $this->mdp;
        }
    }
?>