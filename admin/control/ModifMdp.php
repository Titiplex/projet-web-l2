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

include(__DIR__ . '/../templates/ModifMdpHtml.php');
?>
<script>
    function verif()
    {

        var pass1 = document.getElementById("password").value;
        var pass2 = document.getElementById("password-confirmation").value;
        if (pass1 != pass2)
        {
            alert("Veuillez saisir le même mot de passe");
            return false;
        }
    }
</script>
<?php
if (isset($_POST['submit']))
{
    $user->password = isset($_POST['password'])? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user->password;
    $userDao->update($user);
    echo "<p class='w3-padding w3-text-green'>Changement de Mot de passe pris en compte !</p>";
}


include(__DIR__ . '/../templates/footer.php');
?>
