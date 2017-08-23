<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    public function __construct()
    {
        // middleware can:admin
    }

    public function index()
    {
        return 'admin panel';
    }

    // list of all users => admin.users // with action buttons to below pages
    // {user} details  => admin.users/{user}   // details about user, his expenses and payments
    // {user} expenses => expenses/user/{user} // scopeUser
    // {user} payments => payments/user/{user} // scopeUser

    // admin.roles => RolesController // middleware => can:admin
    // admin.users => UsersController // middleware => can:admin
}
