<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeBonTroqueur</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="stylesheet" href="templates/css/style.css">
</head>
<body style="background-color: #F5F5F5;">
<?php include('templates/html/header.php'); ?>
<div class="w3-container w3-row-padding">
    <main>
        <?php
        $TABPAGES = array(
            "home" => "home",
            "login" => "login",
            "register" => "register"
        );
        if (isset($_GET['page']) && array_key_exists($_GET['page'], $TABPAGES)) {
            include("templates/html/" . $TABPAGES[$_GET['page']] . ".php");
        } else {
            include('templates/html/home.php');
        }
        ?>
    </main>
</div>
<?php include('templates/html/footer.php'); ?>
</body>
</html>