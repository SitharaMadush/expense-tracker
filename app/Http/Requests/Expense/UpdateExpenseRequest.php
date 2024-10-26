<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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