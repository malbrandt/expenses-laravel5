<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 20.08.2017
 * Time: 17:03
 */

namespace App\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class BasicPolicy
{
    use HandlesAuthorization;

    /**
     * Checks permission to current model. Admin has permission to all models
     * regardless of associated user ($model->user_id). For permission naming
     * conventions check file config/permission.php
     *
     * @param User $user user to check permission for
     * @param Model $model model to check permission for
     * @param string $permissionPrefix Only {model}{action} without {owner} suffix
     * @return bool true, if the user has access to passed model
     */
    public function hasPermissionTo(User $user, Model $model, $permissionPrefix = '{Expense}{Get}')
    {
        return $user->can($permissionPrefix.'All')
            || ($user->id ===  $model->user_id
                && $user->can($permissionPrefix.'Own'));
    }
}