<?php

namespace App\Http\Requests\Update;

use App\Expense;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExpense extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // validation in controller based on policies
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Expense::validationRules();
    }
}
