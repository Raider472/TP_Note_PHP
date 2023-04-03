<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../view/ajout.css">
        <title>Document</title>
    </head>
    <body>
        <div id="main-frame">
            <fieldset>
            <h1>Ajout d'une infraction</h1>
                <label for="input_idInf">Id Infraction</label>
                <input type="text" name="input_idInf" value="<?= $inputId ?>">
                <br>
                <label for="input_dateInf">Date</label>
                <input type="date" name="input_dateInf" value="<?= $dateInput ?>">
                <br>
                <label for="select_permis">N° Permis</label>
                <select name="select_permis">
                    <?= $selectPermis ?>
                </select>
                <br>
                <label for="select_voiture">Immatriculation</label>
                <select name="select_voiture">
                    <?= $selectImmatriculation ?>
                </select>
                <br><br>
                <input type="submit" id="submit" value="Valider">
            </fieldset>
        </div>
    </body>
</html>