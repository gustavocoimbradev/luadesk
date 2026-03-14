<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
  
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'content' => 'required|string|min:5|max:50000|not_regex:/<script/i',
            'closes_ticket' => 'bool'
        ];
    }
}
