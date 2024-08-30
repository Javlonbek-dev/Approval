<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' =>['required','string'],
            'stir' => ['required', 'string'],
            'dbit_id' => ['required', 'integer'],
            'ifut_id' => ['required', 'integer'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string'],
            'address' => ['required', 'string'],
            'manager' => ['required', 'string'],
            'region_id' => ['required', 'integer', 'exists:regions,id'],
            'thsht_id' => ['required', 'integer', 'exists:thshts,id'],
        ];

    }
}
