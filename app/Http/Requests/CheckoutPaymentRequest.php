<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:150|min:3',
            'creditCard' => 'required',
            'expDate' => 'required',
            'secCode' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Card holder name is required!',
            'name.max' => 'Card holder name is too long!',
            'name.min' => 'Card holder name is too short!',
            'creditCard.required' => 'Your Credit Card number is required!',
            'expDate.required' => 'Expiration date is required!',
            'secCode.required' => 'Security Code is required!',
            'secCode.numeric' => 'Security Code must be a number!',
        ];
    }
}
