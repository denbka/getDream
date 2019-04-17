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
    public $dream;
    public $coins;
    public $achievements;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    public function create()
    {
        $query = "INSERT INTO users (firstname, lastname, email, password, registered, role, achievements, coins, dream) 
        VALUES ('$this->firstname', '$this->lastname', '$this->email', '$this->password', '$this->registered', '$this->role', '$this->achievements', '$this->coins', '$this->dream')";

        $this->role = "user";
        $this->registered = "2019-04-16";
        $this->achievements = "0";
        $this->coins = "0";
        $this->dream = "Создать getDream";
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

    public function update()
    {
        $query = "UPDATE ".$this->table_name." SET firstname = '$this->firstname', lastname = '$this->lastname', email = '$this->email'";
        $stmt = $this->connect->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
