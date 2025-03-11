<?php
namespace model;

use PDO;
use PDOException;

class UserDao implements DaoInterface
{

    public function selectById(int $id): ?User
    {
        try {
            $stmt = DbConnect::getDb()->prepare("SELECT * FROM \"user\" WHERE id_user = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $role_id = $row['id_role'];

            $role = (new RoleDao())->selectById($role_id);

            return $row ? new User($row['id_user'], $row['mail'], $row['tel'], $row['nom'], $row['prenom'], $row['mdp'], $role) : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }

    public function selectAll(): array
    {
        $users = [];
        try {
            $stmt = DbConnect::getDb()->prepare("SELECT * FROM \"user\"");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $role_id = $row['id_role'];
                $role = (new RoleDao())->selectById($role_id);
                $users[] = new User($row['id'], $row['mail'], $row['tel'], $row['nom'], $row['prenom'], $row['mdp'], $role);
            }

            return $users;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $users;
    }

    public function insert(User|Model $data): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO \"user\" (mail, nom, prenom, tel, mdp, id_role) VALUES (?, ?, ?, ?, ?, ?) RETURNING id_user");
            $stmt->bindValue(1, $data->email);
            $stmt->bindValue(2, $data->name);
            $stmt->bindValue(3, $data->firstname);
            $stmt->bindValue(4, $data->tel);
            $stmt->bindValue(5, $data->password);
            $stmt->bindValue(6, $data->role->id);
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

    public function update(User|Model $data): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE \"user\" SET mail = ?, nom = ?, prenom = ?, tel = ?, mdp = ?, id_role = ? WHERE id_user = ?");
            $stmt->bindValue(1, $data->email);
            $stmt->bindValue(2, $data->name);
            $stmt->bindValue(3, $data->firstname);
            $stmt->bindValue(4, $data->tel);
            $stmt->bindValue(5, $data->password);
            $stmt->bindValue(6, $data->role->id);
            $stmt->bindValue(7, $data->id);
            $stmt->execute();
            $conn->commit();
            return true;
        } catch (PDOException $e) {
            $conn->rollBack();
            echo $e->getMessage();
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("DELETE FROM \"user\" WHERE id_user = ?");
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

    public function getByEmail(string $email) : ?User {
        try {
            $stmt = DbConnect::getDb()->prepare("SELECT * FROM \"user\" WHERE mail = ?");
            $stmt->bindValue(1, $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $role_id = $row['id_role'];

            $role = (new RoleDao())->selectById($role_id);

            return $row ? new User($row['id_user'], $row['mail'], $row['tel'], $row['nom'], $row['prenom'], $row['mdp'], $role) : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }
}