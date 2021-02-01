<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'amount' => 'required',
            'comment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => (trans('validation.field_rate_required')),
            'comment.required' => (trans('validation.field_comment_required')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
