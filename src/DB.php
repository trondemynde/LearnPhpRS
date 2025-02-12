<?php

namespace App;

use PDO;
use PDOException;

class DB
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('sqlite:' . __DIR__ . '/../db.sqlite');
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }



    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }

    public function all($table, $class)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function find($table, $class, $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    public function where($table, $class, $field, $value)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE $field=:value");
        $stmt->execute(['value' => $value]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function insert($table, $fields)
    {
        $fieldNames = array_keys($fields);
        $fieldNamesText = implode(', ', $fieldNames);
        $fieldValuesText = ':' . implode(', :', $fieldNames);

        $sql = "INSERT INTO $table ($fieldNamesText) VALUES ($fieldValuesText)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($fields);
    }

    public function update($table, $fields, $id)
    {
        $updateFieldsText = '';
        foreach ($fields as $key => $value) {
            $updateFieldsText .= "$key=:$key, ";
        }
        $updateFieldsText = rtrim($updateFieldsText, ', ');
        $sql = "UPDATE $table SET $updateFieldsText WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $fields['id'] = $id;
        $stmt->execute($fields);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public function deleteByEmail($table, $email)
    {
        $sql = "DELETE FROM $table WHERE email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
    }
}