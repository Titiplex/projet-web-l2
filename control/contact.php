<?php
session_start();
$racine = '../';
$titre = "Contact us !";

use model\UserDao;
require_once  $racine."model/UserDao.php";

include($racine . 'templates/html/header.php');

include($racine . 'templates/html/contactPage.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $message = wordwrap($_POST['message'], 70);
    $object = $_POST['object'];
    $headers = "From: <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    $admins = (new UserDao())->selectAllByRoleId(1);

    foreach ($admins as $admin) {
        echo mail($admin->email, $object, $message, $headers) ? "Email sent, we'll come back to you as quickly as possible " : "The email has failed to send ";
    }
}

//$user = isset($_SESSION) ? (new UserDao())->selectById($_SESSION['user_id']) : null;

include($racine . 'templates/html/footer.php');