<?php

namespace App\Policies;

use App\User;
use App\Payment;

class PaymentPolicy extends BasicPolicy
{
    /**
     * Determine whether the user can view the payment.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function view(User $user, Payment $payment)
    {
        return $this->checkPermission($user, $payment, 'PaymentGet');
    }

    /**
     * Determine whether the user can create payments.
     *
     * @param  \App\User  $user
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
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function update(User $user, Payment $payment)
    {
        return $this->checkPermission($user, $payment, 'PaymentUpdate');
    }

    /**
     * Determine whether the user can delete the payment.
     *
     * @param  \App\User  $user
     * @param  \App\Payment  $payment
     * @return mixed
     */
    public function delete(User $user, Payment $payment)
    {
        return $this->checkPermission($user, $payment, 'PaymentDestroy');
    }
}
