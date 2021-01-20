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

    public function messages()
    {
        return [
            'ar.question.required' => (trans('validation.field_required_ar_question')),
            'en.question.required' => (trans('validation.field_required_en_question')),
            'ar.answer.required' => (trans('validation.field_required_ar_answer')),
            'en.answer.required' => (trans('validation.field_required_en_answer')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
