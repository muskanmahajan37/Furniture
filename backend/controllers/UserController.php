<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .='/flex-furniture/backend/core/Database.php';
include_once($path);
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
        $query = $this->database->pdo->prepare('INSERT INTO users(name,email,password,is_superadmin,gender,city) VALUES (:name,:email,:password,:is_superadmin,:gender,:city)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':password', $password);
        $query->bindParam(':is_superadmin',$is_superadmin);
        $query->bindParam(':gender', $request['gender']);
        $query->bindParam(':city', $request['city']);
        $query->execute();
        return "Registered";
    }

    public function getById($id)
    {
        $query = $this->database->pdo->query('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
    public function edit($id)
    {
        $query = $this->database->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
    public function update($id, $request)
    {
        isset($request['is_superadmin']) ? $isAdmin = 1 : $isAdmin = 0;
        $query = $this->database->pdo->prepare('UPDATE users SET name = :name,city=:city, email = :email, is_superadmin = :is_superadmin WHERE id = :id');
        $query->execute([
            'name' => $request['name'],
            'city' => $request['city'],
            'email' => $request['email'],
            'is_superadmin' => $isAdmin,
            'id' => $id
        ]);
        return header("Location: ../../users.php");
    }
    public function destroy($id)
    {
        $query = $this->database->pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        return header('Location: ./index.php');
    }


    public function storeFromAdmin($request)
    {
        isset($request['is_superadmin']) ? $is_superadmin = 1 : $is_superadmin = 0;
        $password = password_hash($request['password'], PASSWORD_DEFAULT);
        $query=$this->database->pdo->prepare('SELECT * FROM users WHERE email=:email');
        $query->bindParam(':email', $request['email']);
        $query->execute();
        $user = $query->fetchall();
        if(count($user)==0){
            $query = $this->database->pdo->prepare('INSERT INTO users(name,email,password,is_superadmin,city) VALUES (:name,:email,:password,:is_superadmin,:city)');
            $query->bindParam(':name', $request['name']);
            $query->bindParam(':email', $request['email']);
            $query->bindParam(':password', $password);
            $query->bindParam(':is_superadmin',$is_superadmin);
            $query->bindParam(':city', $request['city']);
            $query->execute();
        }
        else{
            echo 'Ky email ekziston';
        }
    }
}
?>