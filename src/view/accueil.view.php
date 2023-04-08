<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/accueil.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <h1>Bonjour <?= $message ?></h1>
    </header>
    <section>
        <?= $messageInfraction ?>
        <br>
        <?php 
            echo $tableau;
        ?>
    </section>
    <br>
    <?= $boutton ?>
    <br>
    <br>
    <a href="../model/accueil.php?op=deconnexion"><input type="submit" id="SubmitDeconexion" value="Déconnexion"></a>
</body>
</html>


