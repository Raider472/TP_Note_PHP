<?php
    require("../controller/Connexion.php");

    function choixConnexion(): ConnexionDocker | ConnexionIUT {
        try {
            $dbo = new ConnexionDocker("mysql", "dbTp", "Infraction");
            return $dbo;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
            $dbo = new ConnexionIUT("mysql", "nae1u_Infraction", "nae1u_appli", "31904250");
            return $dbo;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        throw new Exception("Aucune connexion possible");
    }
?>