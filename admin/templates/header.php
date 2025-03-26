<?php session_start();
    if (!isset($_SESSION) || $_SESSION['role_id'] != 1) {
        header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeBonTroqueur</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
    <link rel="stylesheet"  href="templates/css/style.css">
    <link rel='stylesheet' href="templates/css/faq.css">
</head>
<body style="background-color: #F5F5F5;">

<header class="w3-theme-d2 w3-cell-row">
    <div class="w3-cell w3-padding w3-cell-middle half"><h1><a class="clean-ref" href="../index.php">LeBonTroqueur</a>
        </h1></div>
    <div class="w3-cell w3-padding w3-cell-middle half align-right">
        <?php if (isset($_SESSION['user_id'])):
            if ($_SESSION['role_id'] == 1):?>
                <a href="index.php" class="w3-button w3-yellow">Accueil Admin</a>
            <?php endif;?>
            <a href="../dashboard" class="w3-button w3-theme">Dashboard</a>
            <a href="../logout" class="w3-button w3-red">Logout</a>
        <?php else: ?>
            <a href="index.php" class="w3-button w3-theme">Dashboard Admin</a>
            <a href="../login" class="w3-button w3-theme">Login</a>
            <a href="../register" class="w3-button w3-theme">Sign Up</a>
        <?php endif; ?>
    </div>
</header>
