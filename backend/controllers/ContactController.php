<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= '/flex-furniture/backend/core/Database.php';
include_once($path);

class ContactController
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function all()
    {
        $query = $this->database->pdo->query('SELECT * FROM contacts');

        return $query->fetchAll();
    }

    public function store($request)
    {
        $query = $this->database->pdo->prepare('INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':message', $request['message']);
        $query->execute();
        return header('Location: contact.php');
    }

    public function edit($id)
    {
        $query = $this->database->pdo->prepare('SELECT * FROM contact WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function update($id, $request)
    {

        $query = $this->database->pdo->prepare('UPDATE contact SET name = :name, email = :email, message = :message WHERE id= :id');
        $query->execute([
            'name' => $request['name'],
            'email' => $request['email'],
            'message' => $request['message'],
        ]);
        return header('Location: contact.php');
    }

    public function destroy($id)
    {
        $query = $this->database->pdo->prepare('DELETE FROM contacts WHERE id = :id');
        $query->execute(['id' => $id]);

        return header('Location: contacts.php');
    }
}
?>