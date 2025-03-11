<?php

use model\UserDao;

session_start();
$racine = '../';

require_once $racine."model/UserDao.php";
require_once $racine.'model/AdDao.php';

$titre = "Dashboard";
include($racine . 'templates/html/header.php');

if (isset($_SESSION["user_id"])){
    $user_dao = new UserDao();
    $user = $user_dao->selectById($_SESSION["user_id"]);
    include($racine . 'templates/html/dashboardPage.php');
    include($racine . 'templates/html/userAds.php');
    $ads = (new \model\AdDao())->selectAllByUser($_SESSION["user_id"]);
    foreach ($ads as $ad) {
        include($racine . 'templates/html/adCard.php');
    }
    echo "</div></div>";
} else {
    header('Location:' . $racine . 'login/control/login.php');
}
include($racine . 'templates/html/footer.php');