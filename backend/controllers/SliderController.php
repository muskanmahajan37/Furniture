<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/flex-furniture/backend/core/Database.php';
include_once($path);

class SliderController
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function all()
    {
        $query = $this->database->pdo->query('SELECT * FROM slider');
        return $query->fetchAll();
    }

    public function store($request)
    {
        $elems = $this->all();
        if (count($elems) >= 5) {
            echo "<h1>You cannot add more than 5 sliders</h1>";
            return;
        }
        $query = $this->database->pdo->prepare('INSERT INTO slider (name,image)VALUES(:name,:image)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':image', $_FILES['image']['name']);
        $query->execute();
        move_uploaded_file($_FILES["image"]["tmp_name"], "./../uploads/" . $_FILES['image']['name']);
    }


    public function edit($id)
    {
        $query = $this->database->pdo->prepare('SELECT * FROM slider WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function update($id, $request)
    {

        if ($_FILES["image"]["error"]) {
            $query = $this->database->pdo->prepare('UPDATE slider SET name = :name WHERE id = :id');
            $query->bindParam(':name', $request['name']);
            $query->bindParam(':id', $id);
            $query->execute();
        } else {
            $upload_path = $_SERVER['DOCUMENT_ROOT'];
            $upload_path .= '/flex-furniture/uploads/';
            $temp_file = $_FILES['image']['tmp_name'];
            $query = $this->database->pdo->prepare('UPDATE slider SET image = :image,name=:name WHERE id = :id');
            $query->bindParam(':name', $request['name']);
            $query->bindParam(':image', $_FILES['image']['name']);
            $query->bindParam(':id', $id);
            $query->execute();
            move_uploaded_file($temp_file, $upload_path . $_FILES['image']['name']);
        }
        return header("Location: ../../slider.php");
    }

    public function destroy($id)
    {
        $query = $this->database->pdo->prepare('DELETE FROM slider WHERE id = :id');
        $query->execute(['id' => $id]);
        return header('Location: slider.php');
    }
}
