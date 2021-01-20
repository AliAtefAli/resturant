<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.policies' => 'required|min:3',
            'en.policies' => 'required|min:3',
            'ar.description' => 'required|min:3',
            'en.description' => 'required|min:3',
            'ar.about' => 'required|min:3',
            'en.about' => 'required|min:3',
            'ar.currency' => 'required|min:3',
            'en.currency' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'delivery_price' => 'required',
            'logo' => 'image|mimes:jpeg,jpg,png,gif,svg',
        ];
    }

    public function messages()
    {
        return [
            'ar.name.required' => (trans('validation.field_required_ar_name')),
            'ar.name.min' => (trans('validation.field_min_3')),
            'en.name.required' => (trans('validation.field_required_en_name')),
            'en.name.min' => (trans('validation.field_min_3')),
            'ar.policies.required' => (trans('validation.field_policies_ar_name')),
            'ar.policies.min' => (trans('validation.field_min_3')),
            'en.policies.required' => (trans('validation.field_policies_en_name')),
            'en.policies.min' => (trans('validation.field_min_3')),
            'ar.description.required' => (trans('validation.field_required_ar_name')),
            'ar.description.min' => (trans('validation.field_min_3')),
            'en.description.required' => (trans('validation.field_required_ar_name')),
            'en.description.min' => (trans('validation.field_min_3')),
            'ar.about.required' => (trans('validation.field_about_ar_name')),
            'ar.about.min' => (trans('validation.field_min_3')),
            'en.about.required' => (trans('validation.field_about_en_name')),
            'en.about.min' => (trans('validation.field_min_3')),
            'ar.currency.required' => (trans('validation.field_currency_ar_name')),
            'ar.currency.min' => (trans('validation.field_min_3')),
            'en.currency.required' => (trans('validation.field_currency_en_name')),
            'en.currency.min' => (trans('validation.field_min_3')),
            'email.required' => (trans('validation.field_required_email')),
            'email.email' => (trans('validation.field_email')),
            'phone.required' => (trans('validation.field_required_phone')),
            'delivery_price.required' => (trans('validation.field_delivery_price')),
            'logo.image' => (trans('validation.field_image')),
        ];
    }


    public function authorize()
    {
        return true;
    }
}
