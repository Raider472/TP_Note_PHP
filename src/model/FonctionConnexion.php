<?php
    require("Connexion.php");

    function choixConnexion(): ConnexionDocker | ConnexionIUT {
        try {
            $dbo = new ConnexionIUT("mysql", "nae1u_Infraction", "nae1u_appli", "31904250");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
            $dbo = new ConnexionDocker("mysql", "dbTp", "Infraction");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $dbo;
    }
?>