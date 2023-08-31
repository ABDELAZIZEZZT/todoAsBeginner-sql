<?php


class DB
{
    public $con;
    public function __construct()
    {
        try {
            $this->con = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
            $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            echo "zezo";
            die($e->getMessage());
        }
    }

    public function getData($table, $columns = "*", $condition = true)
    {
        $query = "SELECT $columns FROM $table WHERE $condition";
        $data = $this->con->query($query);
        return $data->fetchAll();
    }

    public function insertData($table, $columns, $data)
    {
        foreach ($columns as $column) {
            $c[] = '`' . $column . '`';
        }
        $col = implode(', ', $c);
        $d = array_map(function ($x) {
            return gettype($x) == 'string' ?  "'" . $x . "'" : $x;
        }, $data);
        $info = implode(', ', $d);
        $query = "INSERT INTO $table ($col) VALUES ($info)";
        $sql = $this->con->prepare($query);
        return $sql->execute();
    }

    public function updateData($table, $data, $condition)
    {
        foreach ($data as $key => $val) {
            $d[] = "`$key` = '$val'";
        }
        $info = implode(', ', $d);
        $query = "UPDATE $table SET $info WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }

    public  function deleteData($table, $condition = true)
    {
        $query = "DELETE FROM $table WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }
}

