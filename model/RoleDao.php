<?php

namespace model;

require_once "DbConnect.php";
require_once "Role.php";
require_once "DaoInterface.php";

use PDO;
use PDOException;

class RoleDao implements DaoInterface
{
    function selectById(int $id): ?Role
    {
        try {
            $stmt = DbConnect::getDb()->prepare("SELECT * FROM \"role\" WHERE id_role = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ? new Role($row['id_role'], $row['nom_role']) : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }

    function selectAll(): array
    {
        $roles = [];
        try {
            $stmt = DbConnect::getDb()->prepare("SELECT * FROM \"role\"");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $roles[] = new Role($row['id_role'], $row['nom_role']);
            }
            return $roles;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $roles;
    }

    /**
     * @param Role $data
     * @return bool
     */
    function insert($data): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO \"role\" (nom_role) VALUES (?) RETURNING id_role");
            $stmt->bindValue(1, $data->role_name);
            $stmt->execute();
            $data->id = $stmt->fetchColumn();
            $conn->commit();
            return true;
        } catch (PDOException $e) {
            $conn->rollBack();
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * @param Role $data
     * @return bool
     */
    function update($data): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE \"role\" SET nom_role = ? WHERE id_role = ?");
            $stmt->bindValue(1, $data->role_name);
            $stmt->bindValue(2, $data->id);
            $stmt->execute();
            $conn->commit();
            return true;
        } catch (PDOException $e) {
            $conn->rollBack();
            echo $e->getMessage();
        }
        return false;
    }

    function delete(int $id): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM \"role\" WHERE id_role = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $conn->commit();
            return true;
        } catch (PDOException $e) {
            $conn->rollBack();
            echo $e->getMessage();
        }
        return false;
    }
}