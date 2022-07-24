<?php

namespace App\Controller;

use App\Model\TaskModel;
use App\View\Tasks;
use App\View\Tasks\Form;

class TasksController extends BaseController
{
    /**
     * @var TaskModel
     */
    private TaskModel $model;
    

    public function __construct()
    {
        $this->model = new TaskModel();
    }

    public function run()
    {
        $page           = (int) (array_key_exists('page', $_GET) ? $_GET['page'] : 1);
        $sizePage       = 3;
        $offset         = ($page - 1) * $sizePage;
        $sortColumn     = 'id';
        $sortBy         = 'ASC';

        if (array_key_exists('sortColumn', $_GET)) {
            $sortColumn = $_GET['sortColumn'];
            $sortBy     = $_GET['sortBy'];
        };

        $view = new Tasks();
        $view->render([
            'data'          => $this->model->getTasks($offset, $sizePage, $sortColumn, $sortBy),
            'total_page'    => $this->model->count(),
            'page'          => $page,
        ]);
    }

    public function runAdd()
    {
        $errors = [];
        if ($_POST) {
            $errors = $this->checkData($_POST);
            if (! $errors) {
                
                $this->model->create($_POST);

                header('Location: /tasks');
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
        $task = $this->model->getTaskById($_GET['id']);

        $errors = $this->checkData($_POST);
  
        if ($_POST && ! $errors) {
            $this->model->update($_GET['id'], $_POST);

            header('Location: /tasks');
            return;
        }

        $view = new Form();
        $view->render([
            'data' => [
                'title' => $task['title'],
                'description' => $task['description'],
                'email' => $task['email'],
                'status' => $task['status'],
            ],
            'isUpdate' => $_GET['id']
        ]);
    }

    public function runDelete()
    {
        $this->model->delete($_GET['id']);

        header('Location: /tasks');
        return;
    }

    public function checkData($data)
    {
        $return = [];
        
        if (
            ! isset($data['title'])
            || $data['title'] == ''
        ) {
            $return['title'] = 'Забыли назвать задачу';
        }

        if (
            ! isset($data['description'])
            || $data['description'] == ''
        ) {
            $return['description'] = 'Забыли описать задачу';
        }

        if (
            ! isset($data['email'])
            || $data['email'] == ''
        ) {
            $return['email'] = 'Забыли email';
        }

        return $return ;
    }
}
