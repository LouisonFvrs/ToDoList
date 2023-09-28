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
        $id = $this->authModel->login($email, $password);
        if($id != "") {
            SessionHelpers::login($email, $id);
            return Template::render('views/global/home.php');
        } else {
            return Template::render("views/global/login.php");
        }
    }

    function login(){
        return Template::render("views/global/login.php");
    }

    function newAccount(){
        return Template::render('views/global/createAccount.php');
    }

    // Création mot de passe
    function createAccount($nom, $prenom, $email, $motDePasse, $confirmerMotDePasse) {

        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        if (!preg_match($pattern, $email) || $motDePasse !== $confirmerMotDePasse) {
            return Template::render('views/global/createAccount.php');
        }
        else {
            $this->authModel->creation($nom, $prenom, $email, $motDePasse);
            return Template::render('views/global/login.php');
        }
    }
}