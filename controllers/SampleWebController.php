<?php

namespace controllers;

use controllers\base\WebController;
use utils\SessionHelpers;
use utils\Template;

class SampleWebController extends WebController
{
    function home(): string
    {
        if(!SessionHelpers::isLogin()){
            $this->redirect("/");
        }
        return Template::render("views/global/home.php");
    }
}