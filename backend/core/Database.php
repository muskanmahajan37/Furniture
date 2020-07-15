<?php

class Database
{
    public $pdo;

    public function __construct()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $db_name = "flex-furniture-1";
        try {
            $link = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
            $this->pdo = $link;
        } catch (PDOException $e) {
            die('DIE' . $e->getMessage());
        }
    }
}

?>