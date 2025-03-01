<?php
    session_start();
    $racine = '../';
    $titre = "Welcome at LeBonTroqueur";
    include($racine . 'templates/html/header.php');

    if (isset($_SESSION["user_id"])){
        $ads = array(
            [
                "title",
                $racine."images/ads/img.png"
            ],
            [
                "title",
                $racine."images/ads/img.png"
            ],
            [
                "title",
                $racine."images/ads/img.png"
            ],
            [
                "title",
                $racine."images/ads/img.png"
            ]
        );
        include($racine . 'templates/html/homePageConnected.php');
        foreach ($ads as $ad) {
            include($racine . 'templates/html/adCard.php');
        }
        echo "</div></div>";
    } else {
        include($racine . 'templates/html/homePageNotConnected.php');
    }
    include($racine . 'templates/html/footer.php');