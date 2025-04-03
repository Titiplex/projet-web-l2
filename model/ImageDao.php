<?php

namespace model;

require_once "Image.php";
require_once "DbConnect.php";
require_once "DaoInterface.php";

use PDO;
use PDOException;

class ImageDao implements DaoInterface
{
    public function selectById(int $id): ?Image
    {
        try {
            $stmt = DbConnect::getDb()->prepare("SELECT * FROM \"annonce_image\" WHERE id_image = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row ? new Image($id, $row['id_annonce'], $row['image']) : null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }

    public function getByAnnonceId(int $annonceId): array
    {
        $images = [];
        try {
            $stmt = DbConnect::getDb()->prepare("SELECT * FROM annonce_image WHERE id_annonce = ?");
            $stmt->bindValue(1, $annonceId);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $images[] = new Image($row['id_image'],$annonceId, $row['image']);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $images;
    }

    public function selectAll(): array
    {
        $images = [];
        try {
            $stmt = DbConnect::getDb()->query("SELECT * FROM annonce_image");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $images[] = new Image($row['id_image'], $row['id_annonce'], $row['image']);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $images;
    }

    /**
     * @param Image $data
     * @return bool
     */
    public function insert($data): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("INSERT INTO annonce_image (id_annonce, image) VALUES (?, ?) RETURNING id_image");
            $stmt->bindValue(1, $data->annonce_id);
            $stmt->bindValue(2, $data->url);
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
     * @param Image $data
     * @return bool
     */
    public function update($data): bool
    {
        $conn = DbConnect::getDb();
        try {
            $conn->beginTransaction();
            $stmt = $conn->prepare("UPDATE annonce_image SET image = ?, id_annonce = ? WHERE id_image = ?");
            $stmt->bindValue(1, $data->binary);
            $stmt->bindValue(2, $data->annonce_id);
            $stmt->bindValue(3, $data->id);
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
            $stmt = $conn->prepare("DELETE FROM annonce_image WHERE id_image = ?");
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
