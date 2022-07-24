<?php

namespace App\View;

class Users extends Main
{
    public function content($data = [])
    {
        $options = [
            'id' => [
                'label' => '#',
                'class' => 'text-center',
            ],
            'email' => [
                'label' => 'Email',
                'class' => '',
            ],
            'login' => [
                'label' => 'Login',
                'class' => '',
            ],
            'actions' => [
                'label' => 'Действия',
                'class' => 'text-center',
                'buttons' => [
                    'update' => [
                        'icon' => 'fa-pencil',
                        'label' => 'Редактировать',
                        'route' => '/users/update',
                    ],
                    'delete' => [
                        'icon' => 'fa-trash',
                        'label' => 'Удалить',
                        'route' => '/users/delete',
                    ],
                ],
            ],
        ];

        $buttons = [
            [
                'label' => 'Добавить',
                'route' => '/admin/users/add',
            ],
        ];
        
        $this->table($data, $options, $buttons);
    }
}