<?php

namespace App\Controller;

use App\Model\UserModel;
use App\View\Login;

class LoginController extends BaseController
{
    public function run()
    {
        if ($_POST) {
           $model = new UserModel();
           $model->auth($_POST['login'], sha1($_POST['password']));
        }

        $view = new Login();
        $view->render();
    }
}