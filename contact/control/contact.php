<?php
session_start();
$racine = '../../';
$folder = '../';
$titre = "Contact us !";
include($racine . 'templates/html/header.php');

include($folder . 'templates/html/contactPage.php');

include($racine . 'templates/html/footer.php');