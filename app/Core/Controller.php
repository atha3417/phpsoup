<?php

class Controller
{
    public $load, $db;

    public function __construct()
    {
        $this->load = $this;
    }

    public function view($filename, $data = [])
    {
        for ($i = 0; $i < count($data); $i++) {
            $keys = array_keys($data)[$i];
            $values = array_values($data)[$i];
            $$keys = $values;
        }
        include_once "../app/Views/$filename.php";
    }

    public function model($filename)
    {
        include_once "../app/Models/$filename.php";
        $this->$filename = new $filename;
    }

    public function helper($filename)
    {
        include_once "../app/Helpers/$filename.php";
    }

    public function database()
    {
        $this->db = Database::getInstance();
    }

    public function log_message($filename, $message)
    {
        error_log($message, 3, '../app/Logs/' . $filename);
    }
}
