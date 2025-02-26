<?php
session_start();
$racine = '../../';
$folder = '../';
$titre = "Product page : ";
include($racine . 'templates/html/header.php');

include($folder . 'templates/html/adPage.php');

include($racine . 'templates/html/footer.php');