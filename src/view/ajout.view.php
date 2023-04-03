<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <label for="input_idInf">Id Infraction</label>
        <input type="text" name="input_idInf" value="<?= $inputId ?>">
        <label for="input_dateInf">Daten</label>
        <input type="date" name="input_dateInf" value="<?= $dateInput ?>">
        <label for="select_permis">N° Permis</label>
        <select name="select_permis">
            <?= $selectPermis ?>
        </select>
        <label for="select_voiture">Immatriculation</label>
        <select name="select_voiture">
            <?= $selectImmatriculation ?>
        </select>
    </body>
</html>