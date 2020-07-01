<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .='/flex-furniture/backend/core/Database.php';
include_once($path);

class AuthController
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function login($request)
    {
        $query = $this->database->pdo->prepare('SELECT id,name,email,password,is_superadmin FROM users WHERE email = :email');
        $query->bindParam(':email', $request['email']);
        $query->execute();
        $user = $query->fetch();
    
        if(password_verify($request['password'], $user['password'])){
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['is_superadmin'] = $user['is_superadmin'];
            if($user['is_superadmin'] == 1){
                header('Location: backend/users.php');
            }else{
                header("Location: index.php");
            }
        }
    }
}
?>