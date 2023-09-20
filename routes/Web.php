<?php

namespace routes;

use controllers\SampleWebController;
use controllers\TodoWeb;
use routes\base\Route;
use utils\Template;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $todo = new TodoWeb();

        // Appel la méthode « home » dans le contrôleur $main.
        Route::Add('/', [$main, 'home']);

        // Route des fonctionnalités des todos
        Route::Add('/todo/liste', [$todo, 'liste']);
        Route::Add('/todo/ajouter', [$todo, 'ajouter']);
        Route::Add('/todo/terminer', [$todo, 'terminer']);
        Route::Add('/todo/supprimer', [$todo, 'supprimer']);

        // Appel la fonction inline dans le routeur.
        // Utile pour du code très simple, où un tes, l'utilisation d'un contrôleur est préférable.
        Route::Add('/about', function () {
            return Template::render('views/global/about.php');
        });

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

