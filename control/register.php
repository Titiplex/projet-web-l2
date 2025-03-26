<?php
session_start();
$racine = '../';

require_once $racine . 'model/UserDao.php';
require_once $racine . 'model/User.php';
require_once $racine . 'model/Role.php';

$titre = "Sign Up to LeBonTroqueur";

if (isset($_SESSION["user_id"])) header("Location: {$racine}index.php");
include($racine . 'templates/html/header.php');
include($racine . 'templates/html/userFormPage.php');
include($racine . 'templates/html/footer.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_confirm = htmlspecialchars($_POST['password_confirmation']);
    $tel = htmlspecialchars($_POST['tel']);

    $user_dao = new \model\UserDao();

    if ($password == $password_confirm) {
        if (!$user_dao->getByEmail($email) && $user_dao->insert(new model\User(0, $email, $tel, $nom, $prenom, password_hash($password, PASSWORD_DEFAULT), new \model\Role(2, "User")))) {
            mail($email, "You have created an account on LeBonTroqueur.", "You have created an account with the email {$email}.\r\nYour current password is {$password}", "From: <no-reply>\r\n");
            header("Location:" . $racine . "control/login.php");
        } else {
            $errorMessage = "Error during signup";
            include($racine . 'templates/html/error.php');
        }
    } else {
        $errorMessage = "password not confirmed";
        include($racine . 'templates/html/error.php');
    }
}

