<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required|string|min:3|max:141",
            'email'=>'required|email|unique:users',
            'phone'=>'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation'=>'sometimes|required_with:password',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
