<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'sometimes|required',
            'image' => 'required|image|mimes:jpg,jpeg,svg,png,gif',
            'status' => 'sometimes|required',
            'ordered' => 'sometimes|required|unique:sliders',
        ];
    }

    public function messages()
    {
        return [
            'url.required' => (trans('validation.field_required_url')),
            'image.required' => (trans('validation.field_required_image')),
            'image.image' => (trans('validation.field_image')),
            'status.required' => (trans('validation.field_required_status')),
            'ordered.required' => (trans('validation.field_required_ordered')),
            'ordered.unique' => (trans('validation.field_unique_ordered')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
