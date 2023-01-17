
<?php 

require_once __DIR__ . '/DbObject.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faires fonctionner
 */

class DbManager {
    private $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }

    // return l'id inseré
    function insert(string $sql, array $data) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    function insert_advanced(DbObject $dbObj) {
        $sql = "INSERT INTO " . $dbObj->getTableName() . " SET ";
        $data = [];
        foreach ($dbObj->getColumns() as $column) {
            $sql .= $column . "=?,";
            array_push($data, $dbObj->get($column));
        }
        $sql = rtrim($sql, ",");
        return $this->insert($sql, $data);
    }

    function select(string $sql, array $data, string $className) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $className);
    }

    function getById(string $tableName, $id, string $className) {
        $sql = "SELECT * FROM " . $tableName . " WHERE id=?";
        return $this->select($sql, [$id], $className);
    }

    function getById_advanced($id, string $className) {
        $dbObj = new $className();
        $sql = "SELECT * FROM " . $dbObj->getTableName() . " WHERE id=?";
        return $this->select($sql, [$id], $className);
    }

    function getBy(string $tableName, string $column, $value, string $className) {
        $sql = "SELECT * FROM " . $tableName . " WHERE " . $column . "=?";
        return $this->select($sql, [$value], $className);
    }

    function getBy_advanced(string $column, $value, string $className) {
        $dbObj = new $className();
        $sql = "SELECT * FROM " . $dbObj->getTableName() . " WHERE " . $column . "=?";
        return $this->select($sql, [$value], $className);
    }

    function removeById(string $tableName, $id) {
        $sql = "DELETE FROM " . $tableName . " WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    function update(string $tableName, array $data) {
        $sql = "UPDATE " . $tableName . " SET ";
        foreach ($data as $key => $value) {
            $sql .= $key . "=?,";
        }
        $sql = rtrim($sql, ",");
        $sql .= " WHERE id=?";
        $values = array_values($data);
        array_push($values, $data["id"]);
        return $this->db->prepare($sql)->execute($values);
    }

    function update_advanced(DbObject $dbObj) {
        $sql = "UPDATE " . $dbObj->getTableName() . " SET ";
        $data = [];
        foreach ($dbObj->getColumns() as $column) {
            $sql .= $column . "=?,";
            array_push($data, $dbObj->get($column));
        }
        $sql = rtrim($sql, ",");
        $sql .= " WHERE id=?";
        array_push($data, $dbObj->get("id"));
        return $this->db->prepare($sql)->execute($data);
    }

}