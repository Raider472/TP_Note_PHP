<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test BDD</h1>
    <?php
        require("../model/Connexion.php");
        $dbo = new ConnexionDocker("mysql", "dbTp", "Infraction");
        $requete = $dbo->execSQL("SELECT * FROM conducteur");
        var_dump($requete);
    ?>
</body>
</html>