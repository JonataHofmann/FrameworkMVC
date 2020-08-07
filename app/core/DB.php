<?php

namespace App\Core;

use \PDO;

class DB extends PDO
{

    function all($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->query($sql)->fetchAll();
    }

    function where($field, $value, $table)
    {
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        $res = $this->prepare($sql);
        $res->bindParam(":$field", $value);
        $res->execute();
        return $res->fetchAll();
    }

    function find($table, $id)
    {
        return $this->where('id', $id, $table)[0];
    }

    function insert($table, $data = [])
    {
        $queryAttributes = implode(',', array_keys($data));
        $queryValues = "'" . implode("','", $data) . "'";

        $sql = "INSERT INTO $table($queryAttributes) VALUES($queryValues)";

        $this->prepare($sql)->execute();
        return $this->lastInsertId();
    }

    function update($table, $id, $data = [])
    {
        $setValues = [];
        foreach ($data as $attr => $value) {
            $setValues[] = "$attr = '$value'";
        }
        $setQuery = implode(',', $setValues);
        $sql = "UPDATE $table SET $setQuery WHERE id = $id";

        return $this->prepare($sql)->execute();
    }

    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        return $this->prepare($sql)->execute();;
    }
}
