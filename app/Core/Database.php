<?php

class Database
{
    private static $_instance = null;
    private $dbh;

    public function __construct()
    {
        require_once '../app/Config/database.php';
        $this->dbh = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Database;
        };
        return self::$_instance;
    }

    public function query($query)
    {
        $result = mysqli_query($this->dbh, $query);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    public function get($table)
    {
        $result = mysqli_query($this->dbh, "SELECT * FROM $table");
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    public function get_where($table, array $stmt)
    {
        $sql = "SELECT * FROM $table WHERE ";
        if (count($stmt) > 1) {
            for ($i = 0; $i < count($stmt); $i++) {
                $key = array_keys($stmt)[$i];
                $value = array_values($stmt)[$i];
                $sql .= $key;
                $sql .= " = '";
                $sql .= $value;
                $sql .= "'";
                $limit = (count($stmt) - 1);
                if ($i !== $limit) {
                    $sql .= " AND ";
                }
            }
        } else {
            $key = array_keys($stmt)[0];
            $value = array_values($stmt)[0];
            $sql .= $key;
            $sql .= ' = ';
            $sql .= $value;
        }
        $query = mysqli_query($this->dbh, $sql);
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    public function insert($table, array $data)
    {
        $sql = "INSERT INTO $table (";
        for ($i = 0; $i < count($data); $i++) {
            $keys = array_keys($data)[$i];
            $sql .= $keys;
            $limit = (count($data) - 1);
            if ($i !== $limit) {
                $sql .= ', ';
            }
        }
        $sql .= ") VALUES (";
        for ($i = 0; $i < count($data); $i++) {
            $values = array_values($data)[$i];
            $sql .= "'";
            $sql .= $values;
            $limit = (count($data) - 1);
            if ($i !== $limit) {
                $sql .= "', ";
            }
        }
        $sql .= "')";
        $query = mysqli_query($this->dbh, $sql);
    }

    public function update($table, array $data, array $stmt)
    {
        $sql = "UPDATE $table SET ";
        for ($i = 0; $i < count($data); $i++) {
            $keys = array_keys($data)[$i];
            $values = array_values($data)[$i];
            $sql .= $keys;
            $sql .= " = '";
            $sql .= $values;
            $sql .= "'";
            $limit = (count($data) - 1);
            if ($i !== $limit) {
                $sql .= ", ";
            }
        }
        $sql .= " WHERE ";
        if (count($stmt) > 1) {
            for ($i = 0; $i < count($stmt); $i++) {
                $key = array_keys($stmt)[$i];
                $value = array_values($stmt)[$i];
                $sql .= $key;
                $sql .= " = '";
                $sql .= $value;
                $limit = (count($stmt) - 1);
                $sql .= "'";
                if ($i !== $limit) {
                    $sql .= " AND ";
                }
            }
        } else {
            $key = array_keys($stmt)[0];
            $value = array_values($stmt)[0];
            $sql .= $key;
            $sql .= ' = ';
            $sql .= $value;
        }
        $query = mysqli_query($this->dbh, $sql);
    }

    public function delete($table, array $stmt)
    {
        // "DELETE FROM tb_obat WHERE id_obat = '$_GET[id]'"
        $sql = "DELETE FROM $table WHERE ";
        if (count($stmt) > 1) {
            for ($i = 0; $i < count($stmt); $i++) {
                $key = array_keys($stmt)[$i];
                $value = array_values($stmt)[$i];
                $sql .= $key;
                $sql .= " = '";
                $sql .= $value;
                $limit = (count($stmt) - 1);
                $sql .= "'";
                if ($i !== $limit) {
                    $sql .= " AND ";
                }
            }
        } else {
            $key = array_keys($stmt)[0];
            $value = array_values($stmt)[0];
            $sql .= $key;
            $sql .= ' = ';
            $sql .= $value;
        }
        $result = mysqli_query($this->dbh, $sql);
    }

    public function affected_rows()
    {
        if (mysqli_affected_rows($this->dbh)) {
            return 1;
        }
    }

    public function num_rows($query)
    {
        return mysqli_num_rows($query);
    }
}
