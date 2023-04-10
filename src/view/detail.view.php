<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/detail.css">
    <title>Détail</title>
</head>
<body>
    <header>
        <h1>Détail de l'infraction n°<?= $numInfraction ?></h1>
    </header>
    <section>
        <div id="content">
            <h2><?= $utilisateurNom ?></h2>
            <p>Numéro d'infraction :</p>
            <span><?= $numInfraction ?></span>
            <p>Date d'infraction :</p>
            <span><?= $dateInfraction ?></span>
            <p>Immatriculation :</p>
            <span><?= $userImmat ?></span>
            <p>Marque :</p>
            <span><?= $marqueVehicule ?></span>
            <p>Modèle :</p>
            <span><?= $modeleVehicule ?></span>
            <p id="detail">Détails :</p>
            <ul>
                <?= $detailsDelits ?>
            </ul>
            <p>Montant total :</p>
            <span><?= $montantTotal ?></span>
        </div>
        <a href="../model/accueil.php"><input type="button" id="Retour"></a> 
    </section>
</body>
</html>
