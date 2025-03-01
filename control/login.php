<?php

namespace model;
session_start();
$racine = '../';
require_once $racine."model/UserDao.php";
$titre = "Log in LeBonTroqueur";

if (!isset($_SESSION["user_id"])){
    include($racine . 'templates/html/header.php');
    include($racine . 'templates/html/loginPage.php');
    include($racine . 'templates/html/footer.php');

    if (isset($_POST['login'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $db_user = (new UserDao())->getByEmail($email);
        if (password_verify($password, $db_user->password)){
            $_SESSION['user_id'] = $db_user->id;
            $_SESSION['role_id'] = $db_user->role->id;
        }
        header('Location: https://pedago.univ-avignon.fr/~uapv2401251/');
    }
} else {
    header('Location: https://pedago.univ-avignon.fr/~uapv2401251/');
}