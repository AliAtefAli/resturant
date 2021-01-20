<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            "ar.name" => ["required", "min:5", "max:141"],
            "en.name" => ["required", "min:5", "max:141"],
            "ar.description" => "required",
            "en.description" => "required",
            "price" => "required",
            "quantity" => "required",
            'category_id' => 'required|integer',
            'featured' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
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
            'price.required' => (trans('validation.field_required_price')),
            'quantity.required' => (trans('validation.field_required_quantity')),
            'featured.required' => (trans('validation.field_required')),
            'image.required' => (trans('validation.field_required_image')),
            'image.image' => (trans('validation.field_image')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
