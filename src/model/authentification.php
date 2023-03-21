<?PHP
    session_start();

    $identifiants['login'] = isset($_POST[$identifiants['login']])?$_POST[$identifiants['login']]:"";
    $identifiants['password'] = isset($_POST[$identifiants['password']])?$_POST[$identifiants['password']]:"";

    function connexionValidee(array $identifiants): bool {
        $validee = false;
        $login = isset($_SESSION['login']);
        $password = isset($_SESSION['password']);

        require_once 'Connexion.php';
        $db = new Connexion();
        $req = "SELECT num_permis, date_permis, nom_permis, prenom_permis, mdp
                FROM CONDUCTEUR WHERE num_permis = :login AND mdp = :password";
        $res = $db -> execSQL ($req, [':num_permis' => $login, ':mdp' => $password]);
        if (isset($res[0])) $validee = true;
    }

    if (isset($_POST['Connexion'])) {
        if (connexionValidee($identifiants)) {
            $_SESSION[$identifiants['login']] = $identifiants['login'];
            header('location: accueil.php');
        } else {
            $message = "Vos identifiants n'ont pas été trouvés dans notre base de données, veuillez réssayer !";
        }   
    }
    require_once("../view/authentification.view.php");
?>