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
                    $value = $item['status'] == 1
                        ? "<span class='label label-success'>Выполнен</span> "
                        : "<span class='label label-warning'>В ожидании</span>";
                    $value .= $item['edited']
                        ? "<br><span class='label label-primary'>Отредактировано администратором</span>"
                        : '';
                    return $value;
                }
            ],
            'description' => [
                'id' => 'description',
                'label' => 'Описание задачи',
                'class' => '',
            ],
            'actions' => [
                'id' => 'actions',
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
