<!DOCTYPE html>
<html lang="en">
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
        <h2>Voici la liste des infractions que vous avez commies</h2>
        <br>
        <?php 
            echo $tableau;
        ?>
    </section>
    <a href="../model/ajout.php?op=ajout">test ajout</a>
    <a href="../model/accueil.php?op=suppr&num=86">test suppression</a>
    <a href="../model/ajout.php?op=modif&num=1">test modification</a>
</body>
</html>


