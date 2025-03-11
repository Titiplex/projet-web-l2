<?php
session_start();
$racine = "../";
$titre = "Modify or create an ad";

require_once $racine . "Model/AdDao.php";
require_once $racine . "Model/Ad.php";
require_once $racine . "model/Image.php";
require_once $racine . "model/ImageDao.php";

if (!isset($_SESSION['user_id'])) header('Location: index.php');

if (isset($_POST['type'])) {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $description = $_POST['desc'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $user_id = $_POST['user_id'];
    if ($user_id != $_SESSION['user_id']) {
        echo "/!\ Compatibility for user_id";
        header('Location: index.php');
    }
    $adDao = new \model\AdDao();
    $result = false;
    $id_annonce = 0;

    if ($type) {
        $result = $adDao->update(new \model\Ad($_GET['id'], $title, $description, $location, $price, $user_id));
    } else {
        $id_annonce = $adDao->insert(new \model\Ad(0, $title, $description, $location, $price, $user_id));
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];

        // Lire l’image en binaire
        $imageData = file_get_contents($imageTmpPath);

        // Exemple : création objet Image
        $image = new \model\Image($id_annonce, $imageData);
        $imageDao = new \model\ImageDao();
        $imageDao->insert($image);
    } else {
        echo "Erreur lors de l'upload de l'image.";
    }


    if ($result) {
        echo "Process Successful!";
    } else {
        echo "Process Unsuccessful, please try again.";
    }
    header('Location: index.php');
}

include $racine . "templates/html/header.php";
include $racine . "templates/html/adFormPage.php";
include $racine . "templates/html/footer.php";
