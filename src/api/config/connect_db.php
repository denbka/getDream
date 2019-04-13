<?php

class Database
{
    private $host = 'localhost';
    private $dbname = 'myblog';
    private $username = 'root';
    private $password = '';
    public $link;

    public function getConnection()
    {
        $this->link = null;

        try
        {
            $this->link = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->link->exec("set names utf8"); //запускает sql запрос и return кол-во строк задействованных в ходе выполнения(17 строку)
        }
        catch (PDOExeption $exception)
        {
            echo 'error: '. $exception->getMessage();//возвращает сообщение исключения
        }

        return $this->link;
    }
}
