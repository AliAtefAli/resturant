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

    public function authorize()
    {
        return true;
    }
}
