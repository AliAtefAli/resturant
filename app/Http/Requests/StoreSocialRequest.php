<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSocialRequest extends FormRequest
{
    public function rules()
    {
        return [
            'whatsapp' => 'sometimes|required',
            'facebook' => 'sometimes|required',
            'twitter' => 'sometimes|required',
            'instagram' => 'sometimes|required',
            'linkedin' => 'sometimes|required',
            'snapchat' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
            'whatsapp.required' => (trans('validation.field_whatsapp')),
            'facebook.required' => (trans('validation.field_facebook')),
            'twitter.required' => (trans('validation.field_twitter')),
            'instagram.required' => (trans('validation.field_instagram')),
            'linkedin.required' => (trans('validation.field_linkedin')),
            'snapchat.required' => (trans('validation.field_snapchat')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
