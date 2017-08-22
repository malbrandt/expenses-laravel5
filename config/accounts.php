<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 20.08.2017
 * Time: 14:37
 */

return [

    'admin' => [
        'name' => 'Admin',
        'email' => 'marek.malbrandt@gmail.com',
        'password' => 'admin',
        'roles' => ['admin', 'user']
    ],

    'user' => [
        'name' => 'User',
        'email' => 'email@domain.com',
        'password' => 'secret',
        'roles' => ['user']
    ],

];