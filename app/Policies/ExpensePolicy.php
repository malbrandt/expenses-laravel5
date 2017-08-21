<?php

namespace App\Policies;

use App\User;
use App\Expense;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpensePolicy extends BasicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the expense.
     *
     * @param  \App\User $user
     * @param  \App\Expense $expense
     * @return mixed
     */
    public function view(User $user, Expense $expense)
    {
        return $this->checkPermission($user, $expense, 'ExpenseGet');
    }

    /**
     * Determine whether the user can create expenses.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('ExpenseStoreAll')
            || $user->can('ExpenseStoreOwn');
    }

    /**
     * Determine whether the user can update the expense.
     *
     * @param  \App\User $user
     * @param  \App\Expense $expense
     * @return mixed
     */
    public function update(User $user, Expense $expense)
    {
        return $this->checkPermission($user, $expense, 'ExpenseUpdate');
    }

    /**
     * Determine whether the user can delete the expense.
     *
     * @param  \App\User $user
     * @param  \App\Expense $expense
     * @return mixed
     */
    public function delete(User $user, Expense $expense)
    {
        return $this->checkPermission($user, $expense, 'ExpenseDestroy');
    }
}
