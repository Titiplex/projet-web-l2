<?php
    session_start();
    $racine = "../../";
    $folder = "../";
    $titre = "Bienvenue chez LeBonTroqueur";
    include($racine . 'templates/html/header.php');

    if (isset($_SESSION["user_id"])){
        include($folder . 'templates/html/homePageConnected.php');
    } else {
        include($folder . 'templates/html/homePageNotConnected.php');
    }
    include($racine . 'templates/html/footer.php');