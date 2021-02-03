<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {

        return [
            "name" => "required|string|min:3|max:141",
            'email'=>'required|email|unique:users',
            'type'=>'required',
            'status'=>'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation'=>'sometimes|required_with:password',
            'image' => 'image|mimes:jpg,jpeg,svg,png',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => (trans('validation.field_required_name')),
            'name.min' => (trans('validation.field_min_3')),
            'email.required' => (trans('validation.field_required_email')),
            'email.email' => (trans('validation.field_email')),
            'email.unique' => (trans('validation.field_exists_email')),
            'type.required' => (trans('validation.field_required_type')),
            'status.required' => (trans('validation.field_required_status')),
            'password.required' => (trans('validation.field_required_password')),
            'password.min' =>(trans('validation.field_min_8')),
            'password.confirmed' => (trans('validation.password_confirmed')),
            'image.image' => (trans('validation.field_image')),
            'address.required' => (trans('validation.field_required_address')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
