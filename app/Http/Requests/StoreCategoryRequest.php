<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required',
            'en.name' => 'required',
            'category_id' => ''
        ];
    }

    public function messages()
    {
        return [
            'ar.name.required' => (trans('validation.field_required_ar_name')),
            'en.name.required' => (trans('validation.field_required_en_name')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
