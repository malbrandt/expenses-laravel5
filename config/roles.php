<?php

return [
	/**
     * Permissions naming convention:
     *
     * "{Model}{Action}{Owner}"
     *
     * {Model} - name of the model class
     * {Action} - name of action (get/store/update/destroy)
     * {Owner} - the owner of model
     *
     * In example, if we got permission named ExpenseUpdateAll, we can update
     * expenses owned by anyone, but with permission named ExpenseUpdateOwn,
     * we can update the expense only when we are owning it (user.id must
     * be equal to expense.user_id).
     */

	// DON'T CHANGE THE NAME OF THOSE BASIC ROLES (OR YOU WILL NEED TO REFACTOR
    // THOSE IN SOME PLACES IN SCRIPT)
    'admin' => [

        // Expense related permissions:
        ['name' => 'ExpenseGetAll', 'guard_name' => 'web'],
        ['name' => 'ExpenseStoreAll', 'guard_name' => 'web'],
        ['name' => 'ExpenseUpdateAll', 'guard_name' => 'web'],
        ['name' => 'ExpenseDestroyAll', 'guard_name' => 'web'],

        // Payment related permissions:
        ['name' => 'PaymentGetAll', 'guard_name' => 'web'],
        ['name' => 'PaymentStoreAll', 'guard_name' => 'web'],
        ['name' => 'PaymentUpdateAll', 'guard_name' => 'web'],
        ['name' => 'PaymentDestroyAll', 'guard_name' => 'web'],
        
    ],

    // DON'T CHANGE THE NAME OF THOSE BASIC ROLES (OR YOU WILL NEED TO REFACTOR
    // THOSE IN SOME PLACES IN SCRIPT)
    'user' => [

        // Expense related permissions:
        ['name' => 'ExpenseGetOwn', 'guard_name' => 'web'],
        ['name' => 'ExpenseStoreOwn', 'guard_name' => 'web'],
        ['name' => 'ExpenseUpdateOwn', 'guard_name' => 'web'],
        ['name' => 'ExpenseDestroyOwn', 'guard_name' => 'web'],

        // Payment related permissions:
        ['name' => 'PaymentGetOwn', 'guard_name' => 'web'],
        ['name' => 'PaymentStoreOwn', 'guard_name' => 'web'],
        ['name' => 'PaymentUpdateOwn', 'guard_name' => 'web'],
        ['name' => 'PaymentDestroyOwn', 'guard_name' => 'web'],

    ]
];