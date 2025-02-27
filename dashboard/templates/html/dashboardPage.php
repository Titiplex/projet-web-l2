<div class="w3-container parent-middle">
    <div class="w3-card w3-padding w3-margin w3-round w3-half">
        <div class="parent-middle">
            <a class="w3-button w3-theme" href="<?php echo $racine . "userForm/control/userForm.php" ?>">Modifier</a>
        </div>
        <table class="w3-table">
            <tr>
                <th>Name :</th>
                <td><?php echo $user->getName(); ?></td>
            </tr>
            <tr>
                <th>Firstname :</th>
                <td><?php echo $user->getFirstname(); ?></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><?php echo $user->getEmail(); ?></td>
            </tr>
            <tr>
                <th>Phone number :</th>
                <td><?php echo $user->getTel(); ?></td>
            </tr>
        </table>

    </div>
</div>
