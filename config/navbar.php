<?php

return [
    'admin' => [
        'side' => [
//            ['name' => 'Admin panel', 'route' => '/admin', 'icon' => 'fa-lock'],
            ['name' => 'Pending payments', 'route' => url('payments/status/pending'), 'icon' => 'fa-clock-o'],
            [
                'name' => 'Manage roles',
                'route' => 'roles',
                'icon' => 'fa-server',
                'links' => [

                ]
            ],
            ['name' => 'Manage users', 'route' => 'users', 'icon' => 'fa-users'],
        ],
        'top' => [],
    ],
    'user' => [
        'side' => [
            ['name' => 'Expenses', 'route' => '/expenses', 'icon' => 'fa-bars'],
            ['name' => 'Payments', 'route' => '/payments', 'icon' => 'fa-money'],
        ],
        'top' => [
            // Logout link will be always display for logged users
//                    ['name' => 'Logout', 'route' => '/logout', 'icon' => 'fa-sign-out']
        ],
    ],
    'guest' => [
        'side' => [
            ['name' => 'Login', 'route' => '/login', 'icon' => 'fa-sign-in'],
            ['name' => 'Register', 'route' => '/register', 'icon' => 'fa-user-plus'],
        ],
        'top' => [
            // There is nothing about registration
            ['name' => 'Register', 'route' => '/register', 'icon' => 'fa-user-plus'],
            ['name' => 'Login', 'route' => '/login', 'icon' => 'fa-sign-in'],
        ],
    ]
];