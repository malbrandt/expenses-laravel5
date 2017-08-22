<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'amount'
    ];

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    public function user()
    {
        return $this->expense->user;
    }

    //
    public function accept()
    {
        $this->assent = 1;
        $this->assent_modified_at = Carbon::now();
        return $this->save();
    }

    public function reject()
    {
        $this->assent = -1;
        $this->assent_modified_at = Carbon::now();
        return $this->save();
    }

    public static function validationRules()
    {
        return [
            'amount' => 'required|numeric|min:1',
        ];
    }

    public function isModerated()
    {
        return $this->assent !== null;
    }

    public function isApproved()
    {
        return ($this->isModerated() && $this->assent > 0);
    }
}
