<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
{
    public function rules()
    {
        return [
            "ar.name" => "required|min:5|max:191",
            "en.name" => "required|min:5|max:191",
            "ar.description" => "required",
            "en.description" => "required" ,
            'duration_in_day' => 'required',
            'price' => 'required',
            'products' => 'array'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
