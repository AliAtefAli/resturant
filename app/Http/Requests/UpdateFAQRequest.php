<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFAQRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.question' =>'required',
            'en.question' =>'required',
            'ar.answer' =>'required',
            'en.answer' =>'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
