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

    public function messages()
    {
        return [
            'setting.logo.required' => (trans('validation.field_required_image')),
            'setting.logo.image' => (trans('validation.field_image')),
            'setting.favicon.required' => (trans('validation.field_required_image')),
            'setting.favicon.image' => (trans('validation.field_image')),
        ];
    }


    public function authorize()
    {
        return true;
    }
}
