<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'old_password.required' => (trans('validation.field_required_old_password')),
            'password.required' => (trans('validation.field_required_password')),
            'password.min' => (trans('validation.field_min_6')),
            'password.confirmed' => (trans('validation.password_confirmed')),
        ];
    }
}
