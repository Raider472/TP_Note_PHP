<?php
    class Conducteur {

        private string $no_permis;
        private string $date_permis;
        private string $nom;
        private string $prenom;
        private string $mdp;

        function __construct($no_permis, $date_permis, $nom, $prenom, $mdp) {
            $this->no_permis = $no_permis;
            $this->date_permis = $date_permis;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mdp = $mdp;
        }

        function setNoPermis($no_permis) {
            $this->no_permis = $no_permis;
        }

        function getNoPermis() {
            return $this->no_permis;
        }

        function setDatePermis($date_permis) {
            $this->date_permis = $date_permis;
        }

        function getDatePermis() {
            return $this->date_permis;
        }

        function setNom($nom) {
            $this->nom = $nom;
        }
        
        function getNom() {
            return $this->nom;
        }

        function setPrenom($prenom) {
            $this->prenom = $prenom;
        }

        function getPrenom() {
            return $this->prenom;
        }

        function setMdp($mdp) {
            $this->mdp = $mdp;
        }

        function getMdp() {
            return $this->mdp;
        }
    }
?>