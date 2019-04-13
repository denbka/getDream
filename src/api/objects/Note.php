<?php

class Note {
    private $connect;
    private $table_name = "notes";

    public $id;
    public $title;
    public $description;
    public $img;
    public $mark;
    public $created;
    public $author;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM {$this->table_name}";
        $stmt = $this->connect->prepare($query);//подготавливает запрос
        $stmt->execute();//запускает запрос на выполнение

        return $stmt;
    }
}