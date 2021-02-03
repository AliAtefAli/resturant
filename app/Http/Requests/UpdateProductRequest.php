<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.description' => 'required|min:3',
            'en.description' => 'required|min:3',
            'price' => 'required',
            'quantity' => 'required|integer',
            'category_id' => 'required|integer',
            'image.*' => 'image|mimes:jpeg,jpg,png,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'ar.name.required' => (trans('validation.field_required_ar_name')),
            'ar.name.min' => (trans('validation.field_min_3')),
            'en.name.required' => (trans('validation.field_required_en_name')),
            'en.name.min' => (trans('validation.field_min_3')),
            'ar.description.required' => (trans('validation.field_required_ar_description')),
            'ar.description.min' => (trans('validation.field_min_3')),
            'en.description.required' => (trans('validation.field_required_en_description')),
            'en.description.min' => (trans('validation.field_min_3')),
            'price.required' => (trans('validation.field_required_price')),
            'quantity.required' => (trans('validation.field_required_quantity')),
            'category_id.required' => (trans('validation.field_required_category')),
            'image.image' => (trans('validation.field_image')),
        ];
    }


    public function authorize()
    {
        return true;
    }
}
