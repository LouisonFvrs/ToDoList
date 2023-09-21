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
        $stmt = $this->getPdo()->prepare("SELECT * From todos inner join compte on compte.id_Compte = todos.id");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    function ajouterTodo($texte) {
        $stmp = $this->getPdo()->prepare("INSERT INTO todos (texte, termine) VALUES ( ?, 0)");
        $stmp->execute([$texte]);
    }

    function deleteTodo($id) {
        $stmt = $this->getPdo()->prepare("DELETE FROM todos WHERE id = ?");
        $stmt->execute([$id]);
    }
}