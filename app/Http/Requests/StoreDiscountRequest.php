<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'discount_type' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'code' => 'required|unique:discounts'
        ];
    }

    public function messages()
    {
        return [
            'discount_type.required' => (trans('validation.field_required_discount')),
            'status.required' => (trans('validation.field_required_status')),
            'amount.required' => (trans('validation.field_required_amount')),
            'start_date.date' => (trans('validation.Please Enter Correct date')),
            'end_date.date' => (trans('validation.Please Enter Correct date')),
            'start_date.required' => (trans('validation.Please Enter The Start date')),
            'end_date.required' => (trans('validation.Please Enter The End date')),
            'code.required' => (trans('validation.field_required_code')),
            'code.unique' => (trans('validation.field_exists_code')),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
