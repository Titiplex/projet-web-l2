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

include(__DIR__ . '/../templates/ModifNomPrenomHtml.php');
?>
<script>
    function verif()
    {

        var nom = document.getElementById("name").value;
        var prenom = document.getElementById("firstname").value;
        if (nom == '' && prenom =='')
        {
            alert("Veuillez saisir un nom et prenom de tel");
            return false;
        }
    }
</script>

<?php
if (isset($_POST['submit']))
{
    $user->name = isset($_POST['name'])? $_POST['name'] : $user->name;
    $user->firstname = isset($_POST['firstname'])? $_POST['firstname'] : $user->firstname;
    $userDao->update($user);
    echo "<p class='w3-padding w3-text-green'>Changement pris en compte !</p>";
}


include(__DIR__ . '/../templates/footer.php');
?>