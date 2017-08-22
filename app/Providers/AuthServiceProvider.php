<?php

namespace App\Providers;

use App\Expense;
use App\Payment;
use App\Policies\ExpensePolicy;
use App\Policies\PaymentPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\Expense' => 'App\Policies\ExpensePolicy',
//        Payment::class => PaymentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        parent::registerPolicies();

//        Gate::resource('expenses', 'ExpensePolicy');
//        Gate::resource('payment', 'PaymentPolicy');
    }
}
