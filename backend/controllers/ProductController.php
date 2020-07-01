<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/flex-furniture/backend/core/Database.php';
include_once($path);

class ProductController
{
    protected $database;
    public function __construct()
    {
        $this->database = new Database;
    }

    public function all()
    {
        $query = $this->database->pdo->query('SELECT p.id as id, p.name as name, p.code as code, u.name as username,p.price as price, c.name as category, p.description as description, p.created_at as created_at, p.quantity as quantity,
        p.image as image FROM products p JOIN categories c on p.category_id= c.id JOIN users u on p.created_by = u.id');
        return $query->fetchAll();
    }


    public function store($user, $request)
    {
        $query = $this->database->pdo->prepare('INSERT INTO products (category_id, name, price, code, description, quantity, created_by, image)VALUES(:category_id,:name,:price,:code,:description,:quantity,:created_by,:image)');
        $query->bindParam(':category_id', $request['category_id']);
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':price', $request['price']);
        $query->bindParam(':code', $request['code']);
        $query->bindParam(':description', $request['description']);
        $query->bindParam(':quantity', $request['quantity']);
        $query->bindParam(':created_by', $user);
        $query->bindParam(':image', $_FILES['image']['name']);
        $query->execute();
        move_uploaded_file($_FILES["image"]["tmp_name"],"./../uploads/".$_FILES['image']['name']);
        return header('Location: products.php');
    }


    public function delete($id)
    {
        $query = $this->database->pdo->prepare('DELETE FROM products WHERE id = :id');
        $query->execute(['id' => $id]);
        return header('Location: products.php');
    }
}
?>