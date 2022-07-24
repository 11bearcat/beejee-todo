<?php

namespace App\Controller;

use App\View\Main;

class MainController extends BaseController
{
    public function run()
    {
        $view = new Main();
        $view->render();
    }
}