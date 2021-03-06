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
            'delivery_price' => 'required',
            'ar.products' => 'required',
            'en.products' => 'required',
            'count' => 'required',
//            'products' => 'required:array'
        ];
    }

    public function messages()
    {
        return [
            'ar.name.required' => (trans('validation.field_required_ar_name')),
            'en.name.required' => (trans('validation.field_required_en_name')),
            'ar.description.required' => (trans('validation.field_required_ar_description')),
            'en.description.required' => (trans('validation.field_required_en_description')),
            'duration_in_day.required' => (trans('validation.field_required_duration_in_day')),
            'price.required' => (trans('validation.field_required_price')),
            'image.required' => (trans('validation.field_required_image')),
            'delivery_price.required' => (trans('validation.field_delivery_price')),
            'ar.products.required' => (trans('validation.field_required_ar_product')),
            'en.products.required' => (trans('validation.field_required_en_product')),
            'count.required' => (trans('validation.field_required')),
//            'products.required' => (trans('validation.field_required_product')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
