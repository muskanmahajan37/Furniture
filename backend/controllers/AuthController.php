<?php
include './backend/core/Database.php';

class AuthController
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function login($request)
    {
        $query = $this->database->pdo->prepare('SELECT id,name,email,password,is_superadmin FROM users WHERE email = :email');
        $query->bindParam(':email', $request['email']);
        $query->execute();
        $user = $query->fetch();
    
        if(password_verify($request['password'], $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            if($user['is_superadmin'] == 1){
                header('Location: admin.php');
            }else{
                header("Location: index.php");
            }
        }
    }

}