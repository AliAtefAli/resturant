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

    public function authorize()
    {
        return true;
    }
}
