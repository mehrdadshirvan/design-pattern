<?php

class ConnectDB{
    private $conn;
    private $host = "localhost";
    private $db_name = "laravel";
    private $user = "root";
    private $pass = "";

    public function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};",$this->user,$this->pass);
    }


    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new ConnectDB();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}



$instance = new ConnectDB();
$conn = $instance->getConnection();
var_dump($conn);


class Singleton
{

    /**
     * @var Singleton|null
     */
    private $instance = null;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function method()
    {
        return '... method ...';
    }
}

$instance = Singleton::getInstance();
var_dump($instance->method());










