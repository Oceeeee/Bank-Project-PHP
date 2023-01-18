<?php 

require_once __DIR__ . '/DbObject.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faire fonctionner
 */

class DbManager {
    private $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }

    // return l'id inseré
    function insert(string $sql, array $data) {
        // $this->db->prepare
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    function insert_advanced(DbObject $dbObj) {
        $sql = "INSERT INTO " . $dbObj->getTableName() . " (" . implode(', ', $dbObj->getColumnNames()) . ") VALUES (" . implode(',', array_fill(0, count($dbObj->getColumnNames()), '?')) . ")";
        return $this->insert($sql, $dbObj->getValues());
    }

    function select(string $sql, array $data, string $className) { 
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $className);
        return $stmt->fetchAll();
    }

    function getById(string $tableName, $id, string $className) {
        $sql = "SELECT * FROM " . $tableName . " WHERE id = ?";
        $data = [$id];
        return $this->select($sql, $data, $className);
    }

    function getById_advanced($id, string $className) {
        $dbObj = new $className();
        $sql = "SELECT * FROM " . $dbObj->getTableName() . " WHERE id = ?";
        $data = [$id];
        return $this->select($sql, $data, $className);
    }

    function getBy(string $tableName, string $column, $value, string $className) {
        $sql = "SELECT * FROM " . $tableName . " WHERE " . $column . " = ?";
        $data = [$value];
        return $this->select($sql, $data, $className);
    }

    function getBy_advanced(string $column, $value, string $className) {
        $dbObj = new $className();
        $sql = "SELECT * FROM " . $dbObj->getTableName() . " WHERE " . $column . " = ?";
        $data = [$value];
        return $this->select($sql, $data, $className);
        
    }

    function removeById(string $tableName, $id) {
        $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    function update(string $tableName, array $data) {
        $sql = "UPDATE " . $tableName . " SET ";
        $columns = array_keys($data);
    
        for ($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i] . " = ? ";
            if ($i !== count($columns) - 1) {
                $sql .= ", ";
            }
        }
    
        $sql .= "WHERE id = ?";
    
        $values = array_values($data);
        $values[] = $data['id'];
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
    }

    function update_advanced(DbObject $dbObj) {
        $sql = "UPDATE " . $dbObj->getTableName() . " SET ";
        $columns = $dbObj->getColumnNames();
    
        for ($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i] . " = ? ";
            if ($i !== count($columns) - 1) {
                $sql .= ", ";
            }
        }
    
        $sql .= "WHERE id = ?"; 
    
        $values = $dbObj->getValues();
        $values[] = $dbObj->getId();
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
    }

}