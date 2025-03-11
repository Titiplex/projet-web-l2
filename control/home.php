<?php

use model\AdDao;

session_start();
    $racine = '../';
    $titre = "Welcome at LeBonTroqueur";
    include($racine . 'templates/html/header.php');

    require_once $racine . 'model/AdDao.php';

    if (isset($_SESSION["user_id"])){
        $ads = (new \model\AdDao())->selectAll();
        include($racine . 'templates/html/homePageConnected.php');
        foreach ($ads as $ad) {
            include($racine . 'templates/html/adCard.php');
        }
        echo "</div></div>";
    } else {
        include($racine . 'templates/html/homePageNotConnected.php');
    }
    include($racine . 'templates/html/footer.php');