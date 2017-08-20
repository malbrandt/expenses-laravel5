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

    //
    public function accept()
    {
        $this->assent = 1;
        $this->assent_modified_at = Carbon::now();
        $this->save();
    }

    public function reject()
    {
        $this->assent = -1;
        $this->assent_modified_at = Carbon::now();
        $this->save();
    }
}
