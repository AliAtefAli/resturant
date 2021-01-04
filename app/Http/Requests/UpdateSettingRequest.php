<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.policies' => 'required|min:3',
            'en.policies' => 'required|min:3',
            'ar.description' => 'required|min:3',
            'en.description' => 'required|min:3',
            'ar.about' => 'required|min:3',
            'en.about' => 'required|min:3',
            'ar.currency' => 'required|min:3',
            'en.currency' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'delivery_price' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png,gif,svg',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
