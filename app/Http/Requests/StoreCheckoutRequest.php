<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'billing_name' => ['required','string'],
            'billing_email' => ['required', 'email'],
            'billing_address' => ['required','string'],
            'billing_phone' => ['required','string'],
            'payment_method' => ['required','string']
        ];
    }

    public function messages()
    {
        return [
            'billing_name.required' => (trans('validation.field_required_name')),
            'billing_email.required' => (trans('validation.field_required_email')),
            'billing_email.email' => (trans('validation.field_email')),
            'billing_address.required' => (trans('validation.field_required_address')),
            'billing_phone.required' => (trans('validation.field_required_phone')),
            'payment_method.required' => (trans('validation.field_required_payment_method')),
        ];
    }
}
