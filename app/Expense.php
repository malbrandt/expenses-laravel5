<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'amount',
        'name',
        'description'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addPayment(Payment $payment)
    {
        $this->payments()->save($payment);
    }

    public function scopeFilter($query, $filters)
    {
        if ($user = $filters['user']) {
            $query->where('user_id', '=', $user);
        }
    }

    /**
     * Indicates whether the expense has any moderated payments. Functions compares
     * all related payments 'assent' column to null.
     *
     * @return bool true, if any payments weren't moderated yet
     */
    public function hasModeratedPayments()
    {
        $assents = ($this->payments()->pluck('assent')->toArray());

        return in_array(1, $assents) || in_array(-1, $assents);
    }

    public static function validationRules()
    {
        return [
            'amount' => 'required|numeric|min:1',
            'name' => 'required|string|min:1',
        ];
    }
}
