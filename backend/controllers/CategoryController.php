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

    public function edit($id)
    {
        $query = $this->database->pdo->prepare('SELECT * FROM categories WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function store($request)
    {
        $query = $this->database->pdo->prepare('INSERT INTO categories (name)VALUES(:name)');
        $query->bindParam(':name', $request['name']);
        $query->execute();
    }

    public function destroy($id)
    {
        $query = $this->database->pdo->prepare('DELETE FROM categories WHERE id = :id');
        $query->execute(['id' => $id]);
        return header('Location: categories.php');
    }

    public function update($id, $request)
    {
        $query = $this->database->pdo->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':id', $id);
        $query->execute();
        return header("Location: ../../categories.php");
    }


}
