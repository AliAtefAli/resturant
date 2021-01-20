<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendComplaintRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message_subject' => 'required',
            'message' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
