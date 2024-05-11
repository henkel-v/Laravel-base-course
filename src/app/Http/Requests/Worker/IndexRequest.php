<?php

namespace App\Http\Requests\Worker;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
            'email' => 'nullable|string',
            'ageFrom' => 'nullable|integer',
            'ageTo' => 'nullable|integer',
            'description' => 'nullable|string',
            'is_married' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'ageFrom.integer' => 'Age is integer',
            'ageTo.integer' => 'Age is integer',
        ];
    }
}
