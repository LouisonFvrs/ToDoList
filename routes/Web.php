<?php

namespace routes;

use controllers\AuthControler;
use controllers\SampleWebController;
use controllers\TodoWeb;
use routes\base\Route;
use utils\SessionHelpers;
use utils\Template;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $todo = new TodoWeb();
        $auth = new AuthControler();

        // Vérification de la session
        if(SessionHelpers::isLogin()){
            Route::Add('/', [$main, 'home']);

        } else {
            Route::Add('/', [$auth, 'login']);
        }

        // Route des fonctionnalités des todos
        Route::Add('/todo/liste', [$todo, 'liste']);
        Route::Add('/todo/ajouter', [$todo, 'ajouter']);
        Route::Add('/todo/terminer', [$todo, 'terminer']);
        Route::Add('/todo/supprimer', [$todo, 'supprimer']);

        // Page home
        Route::Add('/home', [$main, 'home']);

        // Page à propos
        Route::Add('/about', function () {

            if(!SessionHelpers::isLogin()){
                $this->redirect("/");
            }

            return Template::render('views/global/about.php');
        });

        // Gestion de l'authentification
        Route::Add('/login', [$auth, 'getConnection']);




    }
}

