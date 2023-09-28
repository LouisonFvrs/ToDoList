<?php
namespace models;

use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function marquerCommeTermine($id){
        $stmt = $this->getPdo()->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    function getAll(): ?array
    {
        $id = $_SESSION['id'];
        $stmt = $this->getPdo()->prepare("SELECT * From todos inner join compte on compte.id_Compte = todos.id_Compte WHERE compte.id_Compte = $id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    function ajouterTodo($texte, $email) {
        $id = $_SESSION['id'];
        $stmp = $this->getPdo()->prepare("INSERT INTO todos (texte, termine, id_Compte) VALUES ( ?, 0, $id)");
        $stmp->execute([$texte]);
    }

    function deleteTodo($id) {
        $stmt = $this->getPdo()->prepare("DELETE FROM todos WHERE id = ?");
        $stmt->execute([$id]);
    }
}