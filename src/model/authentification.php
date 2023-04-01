<?PHP
    session_start();
    require("../model/function/verificationConnexion.php");
    require("../model/function/FonctionConnexion.php");
    $identifiants['login'] = (isset($_POST['login'])?$_POST['login']:"");
    $identifiants['password'] = (isset($_POST['password'])?$_POST['password']:"");
    $message = "";
    $_SESSION['login'] = "";
    if (isset($_POST['login'])) {
        if (verificationConnexion($identifiants['login'], $identifiants['password']) === true) {
            $_SESSION['login'] = $identifiants['login'];
            $identifiants['login'] = "";
            $identifiants['password'] = "";
            $message = $_SESSION['login'];
            header("Location: accueil.php");
        }
        else {
            $message = "Le mot de passe et/ou le n° de permis est incorrect";
        }
    }
    include("../view/authentification.view.php");
?>