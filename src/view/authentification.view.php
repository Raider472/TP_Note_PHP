<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Authetification</title>
</head>
<body>
    <header>
        <h1>Bienvenue sur Amende PHP</h1>
        <p>Veuillez entrer vos identifiants pour visualiser vos amendes</p>
    </header>
    <section>
        <div id="login-page">
            <label for="login">Numéro de permis :</label>
            <input type="text" name="login" placeholder="Entrez votre numéro de permis ici" value="<?= $_SESSION[$identifiants['login']]?>">
            <label for="password">Mot de passe :</label>
            <input type="text" name="password" placholder="Entrez votre mot de passe ici" value="<?= $_SESSION[$identifiants['password']]?>">
        </div>
    </section>
</body>
</html>