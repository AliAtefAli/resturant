<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'setting.logo' => 'sometimes|required|image|mimes:png,jpg,jpeg,svg',
            'setting.favicon' => 'sometimes|required|image|mimes:png,jpg,jpeg,svg',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
