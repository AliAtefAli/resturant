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

    public function messages()
    {
        return [
            'ar.name.required' => (trans('validation.field_required_ar_name')),
            'ar.name.min' => (trans('validation.field_min_5')),
            'en.name.required' => (trans('validation.field_required_en_name')),
            'en.name.min' => (trans('validation.field_min_5')),
            'ar.description.required' => (trans('validation.field_required_ar_description')),
            'en.description.required' => (trans('validation.field_required_en_description')),
            'duration_in_day.required' => (trans('validation.field_required_duration_in_day')),
            'price.required' => (trans('validation.field_required_price')),
        ];
    }


    public function authorize()
    {
        return true;
    }
}
