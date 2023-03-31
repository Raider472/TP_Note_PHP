<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
    <title>Acceuil</title>
</head>
<body>
    <header>
        <h1>Bonjour <!--<?= $_SESSION['login'] ?>--> </h1>
    </header>
    <section>
        <h2>Voici la liste des infractions que vous avez commies</h2>
        <br>
        <table>
            <tr>
                <th>Numéro d'infraction</th>
                <th>Date d'infraction</th>
                <th>Véhicule</th>
                <th>Conducteur</th>
                <th>Montant total</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </section>
</body>
</html>


