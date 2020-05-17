<?php
include './backend/core/Database.php';

class UserController
{

    protected $database;

    public function __construct()
    {
        $this->database = new Database;
    }


    public function showAll()
    {
        $query = $this->database->pdo->query('SELECT * FROM users');
        return $query->fetchAll();
    }

    public function register($request)
    {
        isset($request['is_superadmin']) ? $is_superadmin = 1 : $is_superadmin = 0;
        $password = password_hash($request['password'], PASSWORD_DEFAULT);
        $query = $this->database->pdo->prepare('INSERT INTO users(name,email,password,is_superadmin) VALUES (:name,:email,:password,:is_superadmin)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':password', $request['password']);
        $query->bindParam(':is_superadmin', $is_superadmin);
        $query->bindParam(':gender',$request['gender']);
        $query->bindParam(':city',$request['city']);
        $query->execute();
        return "Registered";
    }
}