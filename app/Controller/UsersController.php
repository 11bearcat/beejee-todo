<?php

namespace App\Controller;

use App\Model\UserModel;
use App\View\Users;
use App\View\Users\Form;

class UsersController extends BaseController
{

    /**
     * @var UserModel
     */
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function run()
    {
        $view = new Users();
        $view->render([
            'data' => $this->model->getUsers()
        ]);
    }

    public function runAdd()
    {
        $errors = [];

        if ($_POST) {

            $errors = $this->checkData($_POST);

            if (! $errors) {
                $this->model->create($_POST);
                header('Location: /users');
                return;
            }
        }

        $view = new Form();
        $view->render([
            'errors' => $errors,
            'data' => $_POST,
        ]);
    }

    public function runUpdate()
    {
        $user = $this->model->getUserById($_GET['id']);

        $errors = $this->checkData($_POST);

        if ($_POST && ! $errors) {
            $this->model->update($_GET['id'], $_POST);

            header('Location: /users');
            return;
        }

        $view = new Form();
        $view->render([
            'data' => [
                'username' => $user['name'],
                'useremail' => $user['email'],
            ],
            'isUpdate' => $_GET['id']
        ]);
    }
    
    public function runDelete()
    {
        $this->model->delete($_GET['id']);
        header('Location: /users');
    }

    public function checkData($data): array
    {
        $return = [];
        if (
            ! isset($data['password']) 
            || ! isset($data['password-confirm']) 
            || $data['password'] !== $data['password-confirm']
        ) {
            $return['password'] = 'Неправильный пароль';
        }

        return $return ;
    }
}