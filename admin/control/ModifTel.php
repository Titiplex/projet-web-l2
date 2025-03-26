<?php
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
$user = $userDao->selectById($id);
echo "<h4><span class='w3-text-teal w3-padding w3-show-block'>Modification de  $user->firstname  $user->name. </span></h4>";

include(__DIR__ . '/../templates/ModifTelHtml.php');
?>

<script>
    function verif()
    {

        var tel = document.getElementById("tel").value;
        if (tel == '')
        {
            alert("Veuillez saisir un numéro de tel");
            return false;
        }
    }
</script>

<?php
if (isset($_POST['submit']))
{
    $user->tel = isset($_POST['tel'])? $_POST['tel'] : $user->tel;
    $userDao->update($user);
    echo "<p class='w3-padding w3-text-green'>Changement de numéro de téléphone pris en compte !</p>";
}


include(__DIR__ . '/../templates/footer.php');
?>