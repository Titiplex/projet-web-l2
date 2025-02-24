<?php

namespace model;

use PDO;
use PDOException;

class DbConnect
{
    public static function getDb(): void
    {
        $servername = getenv("DB_HOST");
        $username = getenv("DB_USER");
        $password = getenv("DB_PASSWORD");
        $dbname = getenv("DB_NAME");
        $port = getenv("DB_PORT");

        try {
            $conn = new PDO("pgsql:host=$servername;port=$port;dbname=$dbname", $username, $password);
            $query = "CREATE TABLE IF NOT EXISTS site.\"Personne\"(
    id integer,
    nom character varying(100),
    prenom character varying(100)
    )";
            $conn->exec($query);

            $conn->beginTransaction();
            $query = 'insert into Personne(id, nom, prenom) values (?, ?, ?)';
            $stmt = $conn->prepare($query);
            $stmt->execute([$_SESSION['id'], $_POST['nom'], $_POST['prenom']]);
            $stmt->bindValue(1, $_SESSION['id']);
            $conn->commit();
            // dans les erreurs $conn->rollback()
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
// config.php → les infos de connection
// créer classe qui fait lien entre vos objets et vos tables
// vérifier les transactions