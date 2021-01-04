<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required|string|min:3|max:141",
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id, 'id')],
            'password' => 'nullable|min:6',
            'password_confirmation'=>'sometimes|required_with:password|same:password',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
