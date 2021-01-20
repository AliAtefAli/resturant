<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'sometimes|required',
            'image' => 'image|mimes:jpg,jpeg,svg,png',
            'status' => 'sometimes|required',
            'ordered' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [
            'url.required' => (trans('validation.field_required_url')),
            'image.image' => (trans('validation.field_image')),
            'status.required' => (trans('validation.field_required_status')),
            'ordered.required' => (trans('validation.field_required_ordered')),
        ];
    }


    public function authorize()
    {
        return true;
    }
}
