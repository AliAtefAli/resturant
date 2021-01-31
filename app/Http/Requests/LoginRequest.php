<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|max:255|exists:users',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
