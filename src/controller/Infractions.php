<?php
class Infraction {
    private int $id_inf;
    private string $date_inf;
    private string $no_immat;
    private string $no_permis;

    public function __construct(int $id_inf, string $date_inf, string $no_immat, string $no_permis) {
        $this -> id_inf = $id_inf;
        $this -> date_inf = $date_inf;
        $this -> no_immat = $no_immat;
        $this -> no_permis = $no_permis;
    }

    public function getIdInfraction(): int {
        return $this -> id_inf;
    }

    public function setIdInfraction(int $value) {
        $this -> id_inf = $value;
    }

    public function getDateInfraction(): string {
        return $this -> date_inf;
    }

    public function setDateInfraction(string $value) {
        $this -> date_inf = $value;
    }

    public function getNoImmatriculation(): string {
        return $this -> no_immat;
    }

    public function setNoImmatriculation(string $value) {
        $this -> no_immat = $value;
    }

    public function getNoPermis(): string {
        return $this -> no_permis;
    }

    public function setNoPermis(string $value) {
        $this -> no_permis = $value;
    }

}

?>