<?php

namespace App\Http\Requests\Store;

use App\Expense;
use Illuminate\Foundation\Http\FormRequest;

class StoreExpense extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        $expense = Expense::find($this->route('expense'));
//
        return $this->user()->can('store', Expense::class);
//        return $expense && $this->user()->can('store', $expense);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|min:1|double',
            'name' => 'required|string|max:255'
        ];
    }
}
