<?php
session_start();
$racine = '../../';

require_once $racine . 'model/UserDao.php';
require_once $racine . 'model/User.php';
require_once $racine . 'model/Role.php';


$folder = '../';
$titre = "Sign Up to LeBonTroqueur";

if (!isset($_SESSION["user_id"])){
    include($racine . 'templates/html/header.php');
    include($folder . 'templates/html/registerPage.php');
    include($racine . 'templates/html/footer.php');

    if (isset($_POST['register'])) {
        $nom = htmlspecialchars($_POST['name']);
        $prenom = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $tel = htmlspecialchars($_POST['tel']);

        $user_dao = new \model\UserDao();

        if ($user_dao->getByEmail($email) != null && $user_dao->insert(new model\User(0,  $email, $tel, $nom, $prenom, password_hash($password, PASSWORD_DEFAULT), new \model\Role(2, "User")))) {
            header("Location:" . $racine . "login/control/login.php");
        } else {
            $errorMessage = "Error during signup";
            include($racine . 'templates/html/error.php');
        }
    }

} else {
    header('Location: https://https://pedago.univ-avignon.fr/~uapv2401251/');
}
