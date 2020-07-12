<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .='/flex-furniture/backend/core/Database.php';
include_once($path);

class CategoryController
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function all()
    {
        $query = $this->database->pdo->query('SELECT * FROM categories');
        return $query->fetchAll();
    }
}
