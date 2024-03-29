<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/flex-furniture/backend/core/Database.php';
include_once($path);

class AboutController
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function all()
    {
        $query = $this->database->pdo->query('SELECT * FROM about');
        return $query->fetchAll();
    }

    public function destroy($id)
    {
        $query = $this->database->pdo->prepare('DELETE FROM about WHERE id = :id');
        $query->execute(['id' => $id]);

        return header('Location: about_admin.php');
    }


    public function getAboutById($id)
    {
        $query = $this->database->pdo->prepare('SELECT * FROM about WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }


    public function update($id, $request)
    {
        $query = $this->database->pdo->prepare('UPDATE about SET name = :name,biography=:biography WHERE id = :id');
        $query->execute([
            'name' => $request['name'],
            'biography' => $request['biography'],
            'id' => $id
        ]);
        return header("Location: ../../admin_about.php");

    }

}
