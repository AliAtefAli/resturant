<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDiscountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'discount_type' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'product_id' => 'required',
            'code' => 'required|unique:discounts'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
