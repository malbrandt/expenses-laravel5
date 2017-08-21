<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return query builder for expenses owned by user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Return query builder for payments associated with user (through expenses)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Expense::class);
    }

    public static function sidebarLinks()
    {
        return [
            'admin' => [
                'side' => [
                    ['name' => 'Admin panel', 'route' => '/admin', 'icon' => 'fa-lock'],
                    ['name' => 'Manager roles', 'route' => '/admin/roles', 'icon' => 'fa-server'],
                    ['name' => 'Manager users', 'route' => '/admin/users', 'icon' => 'fa-users'],
                ],
                'top' => [],
            ],
            'user' => [
                'side' => [
                    ['name' => 'Expenses', 'route' => '/expenses', 'icon' => 'fa-bars'],
                    ['name' => 'Payments', 'route' => '/payments', 'icon' => 'fa-money'],
                ],
                'top' => [
                    // Logout link will be always display for logged users
//                    ['name' => 'Logout', 'route' => '/logout', 'icon' => 'fa-sign-out']
                ],
            ],
            'guest' => [
                'side' => [],
                'top' => [
                    ['name' => 'Login', 'route' => '/login', 'icon' => 'fa-sign-in'],
                    // There is nothing about registration
//                    ['name' => 'Register', 'route' => '/register', 'icon' => 'fa-user-plus']
                ],
            ]
        ];
    }
}
