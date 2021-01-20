<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSubscriptionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' => 'required',
            'payment_method' => 'required',
            'subscription_id' => 'required',
            'start_date' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
