<?php

use model\UserDao;

session_start();
$racine = '../';

require_once $racine."model/UserDao.php";

$titre = "Dashboard";
include($racine . 'templates/html/header.php');

if (isset($_SESSION["user_id"])){
    $user_dao = new UserDao();
    $user = $user_dao->selectById($_SESSION["user_id"]);
    include($racine . 'templates/html/dashboardPage.php');
    include($racine . 'templates/html/userAds.php');
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
    foreach ($ads as $ad) {
        include($racine . 'templates/html/adCard.php');
    }
    echo "</div></div>";
} else {
    header('Location:' . $racine . 'login/control/login.php');
}
include($racine . 'templates/html/footer.php');