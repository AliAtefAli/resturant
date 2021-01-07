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

    public function authorize()
    {
        return true;
    }
}
