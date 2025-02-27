<?php
    session_start();
    $racine = "../../";
    $folder = "../";
    $titre = "Modify your profile";

    include $racine."templates/html/header.php";
    include $folder."templates/html/userFormPage.php";
    include $racine."templates/html/footer.php";