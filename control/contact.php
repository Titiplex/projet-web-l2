<?php
session_start();
$racine = '../';
$titre = "Contact us !";
include($racine . 'templates/html/header.php');

include($racine . 'templates/html/contactPage.php');

include($racine . 'templates/html/footer.php');

if(isset($_POST['send'])) {
    $email = $_POST['email'];
    $message = wordwrap($_POST['message'], 70);
    $object = $_POST['object'];
    $headers = "From: $email\r\n";
    mail("contact@lebontroqueur.com", $titre, $message, $headers);
}