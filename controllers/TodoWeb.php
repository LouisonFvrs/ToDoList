<?php
namespace controllers;

use controllers\base\WebController;
use models\TodoModel;
use utils\Template;

class TodoWeb extends WebController
{

    private TodoModel $todoModel;

    function __construct(){
         $this->todoModel = new TodoModel();
    }

    // Lister les todos
    function liste()
    {
        $todos = $this->todoModel->getAll(); // Récupération des TODOS présents en base.
        return Template::render("views/todos/liste.php", array('todos' => $todos)); // Affichage de votre vue.
    }

    // Ajouter une todo
    function ajouter($texte)
    {
        if(strlen($texte) != 0){
            $this->todoModel->ajouterTodo($texte);
            $this->redirect("./liste");
        } else {
            $this->redirect("./liste");
        }
    }

    // Marquer comme terminer une todo
    function terminer($id = ''){
        if($id != ""){
            $this->todoModel->marquerCommeTermine($id);
        }
        $this->redirect("./liste");
    }

    // Supprimer une todo
    function supprimer($id) {
        if ($id != "") {
            $this->todoModel->deleteTodo($id);
        }
        $this->redirect("./liste");
    }
}