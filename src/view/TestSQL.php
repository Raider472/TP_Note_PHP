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
        require("../model/LesConducteurs.php");
        require("../model/function/FonctionConnexion.php");
        require("../model/LesDelits.php");
        $jaaj = new LesConducteurs();
        $jaaaj = new LesDelits();
        $jaaj->fetchAllConducteur();
        $jaaj->displayAllConducteur();
        $jaaj->fetchConducteurByLoginAndPassword("AZ67", "airpach");
        $jaaaj -> fetchAllDelits();
        $jaaaj -> fetchDelitByInfraction(1);
        $jaaaj -> displayAllDelits();
        $jaaaj -> displayMontantTotalByLesDelits();
    ?>
</body>
</html>