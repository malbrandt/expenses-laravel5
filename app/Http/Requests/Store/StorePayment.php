<?php

namespace App\Http\Requests\Store;

use App\Payment;
use Illuminate\Foundation\Http\FormRequest;

class StorePayment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $payment = Payment::find($this->route('payment'));
//
        return $this->user()->can('store', Payment::class);
//        return $payment && $this->user()->can('store', $payment);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|min:0|float',
        ];
    }
}
