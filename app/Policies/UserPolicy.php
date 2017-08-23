<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function before()
    {
        // TODO: return Auth::user()->hasPermissionTo('Manage')
        return Auth::user()->isAdmin();
    }
}
