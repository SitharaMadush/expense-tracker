<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{

    public function Rules()
    {
        return [
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'string|nullable',
            'date' => 'required|date',
        ];
    }

}