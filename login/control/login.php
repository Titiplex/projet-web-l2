<?php
session_start();
$racine = "../../";
$folder = "../";
$titre = "Bienvenue chez LeBonTroqueur";

if (!isset($_SESSION["user_id"])){
    include($racine . 'templates/html/header.php');
    include($folder . 'templates/html/loginPage.php');
    include($racine . 'templates/html/footer.php');
} else {
    header('Location: https://https://pedago.univ-avignon.fr/~uapv2401251/');
}