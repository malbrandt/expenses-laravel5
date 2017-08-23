<?php

return [
    'admin' => [
        'side' => [
            [
                'name' => 'Roles',
                'route' => '#',
                'icon' => 'fa-user-md',
                'links' => [
//                    ['name' => 'Create role', 'route' => '/roles/create', 'icon' => 'fa-user-plus'], // TODO: creating roles
                    ['name' => 'View roles', 'route' => '/roles', 'icon' => 'fa-list'],
                ]
            ],
            [
                'name' => 'Users',
                'route' => 'users',
                'icon' => 'fa-users',
                'links' => [
                    ['name' => 'Create user', 'route' => '/users/create', 'icon' => 'fa-plus'],
                    ['name' => 'View users', 'route' => '/users', 'icon' => 'fa-list'],
                ]
            ],
        ],
        'top' => [],
    ],
    'user' => [
        'side' => [
            [
                'name' => 'Your&nbsp;Expenses',
                'route' => '#',
                'icon' => 'fa-bars',
                'links' => [
                    ['name' => 'Add expense', 'route' => '/expenses/create', 'icon' => 'fa-plus'],
                    ['name' => 'View expenses', 'route' => '/expenses', 'icon' => 'fa-list'],
                ]
            ],
            [
                'name' => 'Payments',
                'route' => '#',
                'icon' => 'fa-money',
                'links' => [
                    ['name' => 'Pending payments', 'route' => '/payments/status/pending', 'icon' => 'fa-clock-o'],
                    ['name' => 'Accepted payments', 'route' => '/payments/status/accepted', 'icon' => 'fa-thumbs-up'],
                    ['name' => 'Rejected payments', 'route' => '/payments/status/accepted', 'icon' => 'fa-thumbs-down'],
                ]
            ],
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