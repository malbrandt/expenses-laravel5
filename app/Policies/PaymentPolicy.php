<?php

namespace App\Policies;

use App\User;
use App\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentPolicy extends BasicPolicy
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
     * Determine whether the user can view the payment.
     *
     * @param  \App\User $user
     * @param  \App\Payment $payment
     * @return mixed
     */
    public function view(User $user, Payment $payment)
    {
        // user can update the payment only when it is not accepted or rejected
        return $user->hasPermissionTo('PaymentGetAll')
            || ($payment->user()->id === $user->id
                && $user->hasPermissionTo('PaymentGetOwn'));
    }

    /**
     * Determine whether the user can create payments.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('PaymentStoreAll')
            || $user->can('PaymentStoreOwn');
    }

    /**
     * Determine whether the user can update the payment.
     *
     * @param  \App\User $user
     * @param  \App\Payment $payment
     * @return mixed
     */
    public function update(User $user, Payment $payment)
    {
        // user can update the payment only when it is not accepted or rejected
        return $user->hasPermissionTo('PaymentUpdateAll')
            || ($payment->assent === null
                && ($payment->user()->id === $user->id
                    && $user->hasPermissionTo('PaymentUpdateOwn')));
    }

    /**
     * Determine whether the user can delete the payment.
     *
     * @param  \App\User $user
     * @param  \App\Payment $payment
     * @return mixed
     */
    public function delete(User $user, Payment $payment)
    {
        // user can update the payment only when it is not accepted or rejected
        return $user->hasPermissionTo('PaymentDestroyAll')
            || ($payment->assent === null
                && ($payment->user()->id === $user->id
                    && $user->hasPermissionTo('PaymentDestroyOwn')));
    }
}
