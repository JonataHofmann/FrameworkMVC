<?php

namespace App\Core;

abstract class Model
{

    protected $db;
    protected $table;
    protected $field_id = 'id';
    protected $referencedTables = [];
    private $defaultMethods = ['__construct', 'instanseMySelf', 'all', 'find', 'where', 'create', 'update', 'destroy'];


    function __construct($attrs = [])
    {
        $this->db = new DB("mysql:host=" . DB_HOST . ";dbname=" . DB_DBNAME, DB_USER, DB_PASSWORD);
    
        foreach ($attrs as $key => $value) {
            if (!is_numeric($key)) {
                $this->$key = $value;
            }
        }
    }

    public function instanseMySelf($instanse)
    {
        $class = get_class($this);
        $mySelf = new $class($instanse);
        return $mySelf;
    }

    function all($withReferences = false)
    {
        $list = [];
        $results = $this->db->all($this->table);
        $class = get_class($this);
        foreach ($results as $key => $result) {
            $model = new $class($result);
            if ($withReferences) {
                foreach ($this->referencedTables as $r) {
                    $model->$r = $model->$r();
                }
            }
            $list[] = $model;
        }
        return $list;
    }

    function find($id, $withReferences = false)
    {
        return $this->where($this->field_id, $id, $withReferences)[0];
    }

    function where($field, $value, $withReferences = false)
    {
        $collection = [];
        $rows = $this->db->where($field, $value, $this->table);
        foreach ($rows as $row) {
            $model = $this->instanseMySelf($row);
            if ($withReferences) {
                foreach (get_class_methods($this) as $r) {
                    if (!in_array($r, $this->defaultMethods)) {
                        echo "$r<br/>";
                        $model->$r = $model->$r();
                    }
                }
            }
            $collection[] = $model;
        }
        return $collection;
    }

    function create($values = [])
    {
        return $this->db->insert($this->table, $values);
    }

    function update($id, $values = [])
    {
        $id = $this->db->update($this->table, $id, $values);
        return $values + ['id' => $id];
    }

    function destroy($id)
    {
        return $this->db->delete($this->table, $id);
    }
}
