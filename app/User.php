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

    public function paymentsPending()
    {
        return $this->payments()
            ->where('assent', '=', null);
    }

    public function paymentsAccepted()
    {
        return $this->payments()
            ->where('assent', '=', 1);
    }

    public function paymentsRejected()
    {
        return $this->payments()
            ->where('assent', '=', -1);
    }

    /**
     * Indicates whether this user has 'admin' role.
     *
     * @return bool true, if has 'admin' role
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public static function validationRules()
    {
        return [
            'name' => 'required|string|min:1',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }
}
