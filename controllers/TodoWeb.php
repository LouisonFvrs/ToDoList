<?php
namespace controllers;

use controllers\base\WebController;
use models\TodoModel;

class TodoWeb extends WebController
{

    private $todoModel;

    function __construct(){
         $this->todoModel = new TodoModel();
    }

}