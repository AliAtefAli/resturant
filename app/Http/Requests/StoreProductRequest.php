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

    public function authorize()
    {
        return true;
    }
}
