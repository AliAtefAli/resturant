<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSubscriptionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'shipping_type' => 'required',
            'subscription_id' => 'required',
            'start_date' => 'required',
            'people_count' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
