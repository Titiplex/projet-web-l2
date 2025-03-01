<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeBonTroqueur</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="stylesheet"  href="<?php echo $racine."templates/css/style.css"; ?>">
</head>
<body style="background-color: #F5F5F5;">

<header class="w3-theme-d2 w3-cell-row">
    <div class="w3-cell w3-padding w3-cell-middle half"><h1><a class="clean-ref" href="https://pedago.univ-avignon.fr/~uapv2401251">LeBonTroqueur</a>
        </h1></div>
    <div class="w3-cell w3-padding w3-cell-middle half align-right">
        <?php if (isset($_SESSION['user_id'])):
            if ($_SESSION['role_id'] == 1):?>
            <a href="<?php echo $racine."admin/index.php" ?>" class="w3-button w3-yellow">Admin</a>
            <?php endif;?>
            <a href="<?php echo $racine."control/dashboard.php" ?>" class="w3-button w3-theme">Dashboard</a>
            <a href="<?php echo $racine."control/logout.php"?>" class="w3-button w3-red">Logout</a>
        <?php else: ?>
            <a href="<?php echo $racine."control/login.php"?>" class="w3-button w3-theme">Login</a>
            <a href="<?php echo $racine."control/register.php"?>" class="w3-button w3-theme">Sign Up</a>
        <?php endif; ?>
    </div>
</header>

<div class="w3-container w3-row-padding">
    <main>
        <div class="w3-center">
            <h2><?php echo $titre; ?></h2>
        </div>