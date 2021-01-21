<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendNewsLetterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'emails' => 'required',
            'message' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'emails.required' => (trans('validation.field_required_emails')),
            'message.required' => (trans('validation.Message Required')),
        ];
    }
}
