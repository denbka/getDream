<?php

class User {
    private $connect;
    private $table_name = "users";

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $registered;
    public $role;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    public function create()
    {
        $query = "INSERT INTO users (firstname, lastname, email, password, registered, role) 
        VALUES ('$this->firstname', '$this->lastname', '$this->email', '$this->password', '$this->registered', '$this->role')";

        $this->role = "user";
        $this->registered = "2019-04-13";

        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function signIn()
    {
        $query = "SELECT * FROM ".$this->table_name." WHERE email = '".$this->email. "' LIMIT 1";
        $stmt = $this->connect->prepare($query);//подготавливает запрос
        $stmt->execute();//запускает запрос на выполнение
        
        return $stmt;
    }
}