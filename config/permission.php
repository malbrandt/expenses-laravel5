<?php

return [

    'models' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         * The model you want to use as a Permission model needs to implement the
         * `Spatie\Permission\Contracts\Permission` contract.
         */

        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         *
         * The model you want to use as a Role model needs to implement the
         * `Spatie\Permission\Contracts\Role` contract.
         */

        'role' => Spatie\Permission\Models\Role::class,

    ],

    'table_names' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_roles' => 'model_has_roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'role_has_permissions',
    ],

    /*
     * By default all permissions will be cached for 24 hours unless a permission or
     * role is updated. Then the cache will be flushed immediately.
     */

    'cache_expiration_time' => 60 * 24,

    /*
     * By default we'll make an entry in the application log when the permissions
     * could not be loaded. Normally this only occurs while installing the packages.
     *
     * If for some reason you want to disable that logging, set this value to false.
     */

    'log_registration_exception' => true,

    /**
     * Permissions seeding for database.
     *
     * Naming convention:
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

    'seed' => [

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
    ]
];
