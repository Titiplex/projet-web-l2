<?php
$racine = '../';
$titre = "Welcome at LeBonTroqueur";
include(__DIR__ . '/../templates/header.php');

require_once __DIR__ . '/../../model/UserDao.php';
use model\UserDao;


// Vérifier que l'ID est fourni dans l'URL
if (!isset($_GET['id'])) {
    echo "Aucun identifiant d'utilisateur fourni.";
    exit;
}

$id = intval($_GET['id']);
$userDao = new UserDao();
echo "<p class='w3-padding w3-text-green'>Suppression pris en compte !</p>";
$userDao->delete($id);



include(__DIR__ . '/../templates/footer.php');
?>