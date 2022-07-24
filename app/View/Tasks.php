<?php

namespace App\View;

class Tasks extends Main
{
    public function content($data = [])
    {
        $options = [
            'id' => [
                'id' => 'id',
                'label' => '#',
                'class' => 'text-center',
            ],
            'title' => [
                'id' => 'title',
                'label' => 'Имя пользователя',
                'class' => '',
            ],
            'email' => [
                'id' => 'email',
                'label' => 'E-mail',
                'class' => '',
            ],
            'status' => [
                'id' => 'status',
                'label' => 'Статус',
                'class' => '',
                'transform' => function($item){
                    if ($item['status'] == 1) {
                        return '<span class="label label-success">Выполнен</span>';
                    } else {
                        return '<span class="label label-warning">В ожидании</span>';
                    }
                }
            ],
            'description' => [
                'label' => 'Описание задачи',
                'class' => '',
            ],
            'actions' => [
                'label' => 'Действия',
                'class' => 'text-center',
                'buttons' => [
                    'update' => [
                        'icon' => 'fa-pencil',
                        'label' => 'Редактировать',
                        'route' => '/tasks/update',
                    ],
                    'delete' => [
                        'icon' => 'fa-trash',
                        'label' => 'Удалить',
                        'route' => '/tasks/delete',
                    ],
                ],
            ],
        ];

        $buttons = [
            [
                'label' => 'Добавить',
                'route' => '/tasks/add',
            ],
        ];

        $this->table($data, $options, $buttons);
    }
}
