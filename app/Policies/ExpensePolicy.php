<?php

namespace App\Policies;

use App\User;
use App\Expense;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ExpensePolicy extends BasicPolicy
{

    public function before()
    {
        // Admin can do anything ...
        if (Auth::user()->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view the expense.
     *
     * @param  \App\User $user
     * @param  \App\Expense $expense
     * @return mixed
     */
    public function view(User $user, Expense $expense)
    {
        return $this->hasPermissionTo($user, $expense, 'ExpenseGet');
    }

    /**
     * Determine whether the user can create expenses.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public
    function create(User $user)
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
        // user can update the expense only when it doesn't have any
        // accepted or rejected payments
        return $user->hasPermissionTo('ExpenseUpdateAll')
            || ($expense->hasModeratedPayments() === false
                && ($expense->user_id === $user->id
                    && $user->hasPermissionTo('ExpenseUpdateOwn')));

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
        // user can update the expense only when it doesn't have any
        // accepted or rejected payments
        return $user->hasPermissionTo('ExpenseDestroyAll')
            || ($expense->hasModeratedPayments() === false
                && ($expense->user_id === $user->id
                    && $user->hasPermissionTo('ExpenseDestroyOwn')));
    }
}
