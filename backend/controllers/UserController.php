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
        $query = $this->database->pdo->prepare('INSERT INTO users(name,email,password,is_superadmin,gender,city,date_of_birth) VALUES (:name,:email,:password,:is_superadmin,:gender,:city,:date_of_birth)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':password', $password);
        $query->bindParam(':is_superadmin',$is_superadmin);
        $query->bindParam(':gender', $request['gender']);
        $query->bindParam(':city', $request['city']);
        $query->bindParam(':date_of_birth', $request['date_of_birth']);
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
        $query = $this->db->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
    public function update($id, $request)
    {
        isset($request['is_admin']) ? $isAdmin = 1 : $isAdmin = 0;
        $query = $this->db->pdo->prepare('UPDATE users SET name = :name, email = :email, is_admin = :is_admin WHERE id = :id');
        $query->execute([
            'name' => $request['fullName'],
            'email' => $request['email'],
            'is_admin' => $isAdmin,
            'id' => $id
        ]);
        return header('Location: ./index.php');
    }
    public function destroy($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        return header('Location: ./index.php');
    }
}
