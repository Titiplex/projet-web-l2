<?php

namespace model;

require_once __DIR__."/Role.php";
require_once __DIR__."/Model.php";
require_once __DIR__."/DaoInterface.php";
require_once __DIR__. "/DbConnect.php";

use PDO;

class RoleDao implements DaoInterface
{
    function selectById(int $id): ?Role
    {
        $stmt = DbConnect::getDb()->prepare("SELECT * FROM \"role\" WHERE id_role = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? new Role($row['id_role'], $row['nom_role']) : null;
    }

    function selectAll(): array
    {
        // TODO: Implement selectAll() method.
    }

    function insert(Model $data): bool
    {
        // TODO: Implement insert() method.
    }

    function update(Model $data): bool
    {
        // TODO: Implement update() method.
    }

    function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }
}