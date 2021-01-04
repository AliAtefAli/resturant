<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    public function authorize()
    {
        return true;
    }
}
