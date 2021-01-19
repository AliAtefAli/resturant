<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    public function rules()
    {
        return [
            "ar.name" => "required|max:191",
            "en.name" => "required|max:191",
            "ar.description" => "required",
            "en.description" => "required" ,
            'duration_in_day' => 'required',
            'price' => 'required',
            'image' => 'required',
            'products' => 'array'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
