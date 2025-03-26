<?php
$racine = '../';
$titre = "Welcome at LeBonTroqueur";

require_once __DIR__ . '/../../model/UserDao.php';
use model\UserDao;

// Vérifier que l'ID est fourni dans l'URL
if (!isset($_GET['id'])) {
    echo "Aucun identifiant d'utilisateur fourni.";
    exit;
}

$id = intval($_GET['id']);
$userDao = new UserDao();
$user = $userDao->selectById($id);

if (!$user) {
    echo "Utilisateur non trouvé.";
    exit;
}

// Préparation des variables pour la vue
$title = "Profil de " . htmlspecialchars($user->firstname) . ' ' . htmlspecialchars($user->name);

$racine = "../../";
/*$ads = array(
    [
        "title",
        "images/ads/img.png"
    ],
    [
        "title",
        "images/ads/img.png"
    ],
    [
        "title",
        "images/ads/img.png"
    ],
    [
        "title",
        "images/ads/img.png"
    ]
);*/

// Inclure la vue qui affichera le HTML
include '../templates/profilehtml.php';

/*foreach ($ads as $ad) {
    echo "<div class='w3-card w3-container w3-padding w3-quarter'>";
    echo "<a href='control/ad.php' class='clean-ref'><h4>" . htmlspecialchars($ad[0]) . "</h4></a>";
    echo "<img alt='small image' src='" . htmlspecialchars($ad[1]) . "'>";
    echo "</div>";
}$

echo "<br> <div class='w3-container w3-padding w3-margin'>";
echo "<a href='admin/index.php' class='w3-button w3-theme'>Retour</a>";
echo "<a href='control.php' class='w3-button w3-red'>Supprimer</a>";
echo "</div>";
?>*/