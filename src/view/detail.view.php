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
        <h1>Détail de l'infraction n°<?= $message ?></h1>
    </header>
    <section>
        <div>
            <p>Numéro d'infraction :</p>
            <span>1</span>
            <p>Date d'infraction :</p>
            <span>15 Mai 2023</span>
            <p>Véhicule :</p>
            <span>Connard</span>
            <p>Modèle :</p>
            <span>Sport</span>
            <p>Marque :</p>
            <span>Audi</span>
            <p id="detail">Details :</p>
            <ul>
                <li>Excès de vitesse</li>
                <li>Outrage à agent</li>
                <li>Refus de priorité</li>
            </ul>
            <p>Montant total :</p>
            <span>500 €</span>
        </div>
        <input type="button" id="Retour">
    </section>
</body>
</html>
