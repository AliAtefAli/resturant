<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [

            'ar.name' => 'required',
            'en.name' => 'required',
            'category_id' => 'sometimes|nullable'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
