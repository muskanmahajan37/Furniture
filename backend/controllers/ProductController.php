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

    public function edit($product_id)
    {
        $query = $this->database->pdo->prepare('SELECT p.id as product_id, p.name as product_name, p.code as product_code,p.price as product_price,
                                u.name as user, c.name as category_name,c.id as category_id,
                                p.description as product_description, p.created_at as product_createdDate,
                                p.quantity as product_quantity,p.description as product_short_description,
                                p.image as product_image
                                        FROM products p
                                        JOIN categories c on p.category_id = c.id
                                        JOIN users u on p.created_by = u.id
                                        WHERE p.id = :product_id');

        $query->execute(['product_id' => $product_id]);
        return $query->fetch();
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
        move_uploaded_file($_FILES["image"]["tmp_name"], "./../uploads/" . $_FILES['image']['name']);
        return header('Location: products.php');
    }

    public function update($product_id, $user, $request)
    {
            if ($_FILES["image"]["error"]) {
                $query = $this->database->pdo->prepare('UPDATE products SET name=:name,
                description=:description,code=:code,
                quantity=:quantity,
                category_id=:category_id,
                created_by=:created_by,
                price=:price
                WHERE id=:id');
                $query->bindParam(":name", $request["product_name"]);
                $query->bindParam(":description", $request["product_description"]);
                $query->bindParam(":code", $request["product_code"]);
                $query->bindParam(":quantity", $request["product_quantity"]);
                $query->bindParam(":category_id", $request["product_category"]);
                $query->bindParam(':price', $request["product_price"]);
                $query->bindParam(":created_by", $user);
                $query->bindParam(":id", $product_id);
                $query->execute();
        } else {
            $upload_path = $_SERVER['DOCUMENT_ROOT'];
            $upload_path .= '/flex-furniture/uploads/';
            $temp_file = $_FILES['image']['tmp_name'];
            $query = $this->database->pdo->prepare('UPDATE products SET name=:name,
                description=:description,code=:code,
                quantity=:quantity,
                category_id=:category_id,
                created_by=:created_by,
                price=:price,
                image = :image
                WHERE id=:id');
            $query->bindParam(":name", $request["product_name"]);
            $query->bindParam(":description", $request["product_description"]);
            $query->bindParam(":code", $request["product_code"]);
            $query->bindParam(":quantity", $request["product_quantity"]);
            $query->bindParam(":category_id", $request["product_category"]);
            $query->bindParam(':image', $_FILES['image']['name']);
            $query->bindParam(':price', $request["product_price"]);
            $query->bindParam(":created_by", $user);
            $query->bindParam(":id", $product_id);
            $query->execute();
            move_uploaded_file($temp_file, $upload_path . $_FILES['image']['name']);
        }
        return header("Location: ../../products.php");

    }

    public function delete($id)
    {
        $query = $this->database->pdo->prepare('DELETE FROM products WHERE id = :id');
        $query->execute(['id' => $id]);
        return header('Location: products.php');
    }
}

?>