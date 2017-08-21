<?php

namespace Tests\Helpers;

use App\User;

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 20.08.2017
 * Time: 19:44
 */
trait MakesAdminAndUsers
{
    protected $admin;
    protected $users;

    public function makeAdminAndUsers()
    {
        $this->admin = factory(User::class)->make([
            'name' => config('admin.name'),
            'email' => config('admin.email'),
            'password' => bcrypt(config('admin.email')),
        ]);

//        $this->admin = User::where('email', '=', config('admin.email'));
//        $this->user = User::where('id', '=', '2')->first();
        $this->users = factory(User::class, 10);
    }
}