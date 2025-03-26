<?php
include(__DIR__ . '/../templates/header.php');

require_once __DIR__ . '/../../model/UserDao.php';
use model\UserDao;
use model\RoleDao;

// Vérifier que l'ID est fourni dans l'URL
if (!isset($_GET['id'])) {
    echo "Aucun identifiant d'utilisateur fourni.";
    exit;
}

$id = intval($_GET['id']);
$userDao = new UserDao();
$RoleDao = new RoleDao();
$user = $userDao->selectById($id);
echo "<h4><span class='w3-text-teal w3-padding w3-show-block'>Modification de  $user->firstname  $user->name. </span></h4>";

include(__DIR__ . '/../templates/ModifRoleHtml.php');
?>

<script>
    function verif()
    {

        var tel = document.getElementById("tel").value;
        if (tel == '')
        {
            alert("Veuillez saisir un Role");
            return false;
        }
    }
</script>
<?php
if (isset($_POST['submit']))
{
    $user->role->role_name = isset($_POST['role'])? $_POST['role'] : $user->role->role_name;
    //echo $user->role->role_name;
    $id_role = $RoleDao->getIdRole($user->role->role_name);
    //echo $id_role;
    $user->role->id = isset($_POST['role'])?  $id_role : $user->role->role_name;
    //echo $user->role->id;
    //echo $user->role->role_name;
    $userDao->update($user);
    echo "<p class='w3-padding w3-text-green'>Changement de numéro de Role pris en compte !</p>";
}


include(__DIR__ . '/../templates/footer.php');
?>