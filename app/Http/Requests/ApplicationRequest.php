<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'number_in'=>['required','string'],
            'number_out'=>['required','string'],
            'date_in'=>['required','date'],
            'date_out'=>['required','date'],
            'file'=>['required','string'],
        ];
    }
}
