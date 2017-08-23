<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RolePolicy
{
    use HandlesAuthorization;

    public function before()
    {
        // TODO: create CanManageRoles permission
        return Auth::user()->isAdmin();
    }

}
