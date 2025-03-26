<link rel='stylesheet' href='../templates/css/faq.css'>
<?php
$racine = '../';
$titre = "Welcome at LeBonTroqueur";
include(__DIR__ . '/../templates/header.php');

require_once __DIR__ . '/../../model/UserDao.php';
use model\UserDao;

$userDao = new UserDao();
$users = $userDao->selectAll();

//var_dump($users);
include('templates/tableauUtilisateur.php');
include('templates/footer.php');
?>

