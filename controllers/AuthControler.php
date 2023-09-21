<?php
namespace controllers;

use controllers\base\WebController;
use models\AuthModel;
use utils\SessionHelpers;
use utils\Template;

class AuthControler extends WebController
{

    private AuthModel $authModel;

    function __construct(){
        $this->authModel = new AuthModel();
    }

    function getConnected($email, $password) {

        SessionHelpers::logout();

        if($this->authModel->login($email, $password)) {
            SessionHelpers::login($email);
            return Template::render('views/global/home.php');
        } else {
            return Template::render("/views/global/login.php");
        }
    }

    function login(){
        return Template::render("views/global/login.php");
    }
}