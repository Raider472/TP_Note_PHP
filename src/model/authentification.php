<?PHP
    session_start();
    require("../model/function/verificationConnexion.php");
    $identifiants['login'] = (isset($_POST['login'])?$_POST['login']:"");
    $identifiants['password'] = (isset($_POST['password'])?$_POST['password']:"");
    $message = "";
    $_SESSION['login'] = "aaa";
    var_dump($identifiants); //TODO Debug à virer
    if (isset($_POST['login'])) {
        if (verificationConnexion($identifiants['login'], $identifiants['password']) === true) {
            $_SESSION['login'] = $identifiants['login'];
            $identifiants['login'] = "";
            $identifiants['password'] = "";
            $message = $_SESSION['login'];
        }
        else {
            $message = "Le mot de passe ou le login est erronée";
        }
    }
    include("../view/authentification.view.php");
?>