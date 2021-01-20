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

    public function messages()
    {
        return [
            'discount_type.required' => (trans('validation.field_required_discount')),
            'status.required' => (trans('validation.field_required_status')),
            'amount.required' => (trans('validation.field_required_amount')),
            'product_id.required' => (trans('validation.field_required_product')),
            'code.required' => (trans('validation.field_required_code')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
