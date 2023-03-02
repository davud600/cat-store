<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingInfoRequest extends FormRequest
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
            'fullName' => 'required|max:150|min:3',
            'email' => 'required|email|max:255',
            'address' => 'required|min:3|max:255',
            'address2' => 'nullable|min:3|max:255',
            'city' => 'required|min:3|max:255',
            'province' => 'required|min:3|max:255',
            'zipCode' => 'required|min:1|numeric',
            'country' => 'required|min:1|max:3',
        ];
    }

    public function messages(): array
    {
        return [
            'fullName.required' => 'Your Full Name is required!',
            'fullName.max' => 'The name you provided is too long!',
            'fullName.min' => 'The name you provided is too short!',
            'email.required' => 'Your E-mail is required!',
            'email.email' => 'Please provide a valid E-mail!',
            'email.max' => 'Them E-mail you provided is too long!',
            'address.required' => 'Your Address is required!',
            'address.max' => 'The address you provided is too long!',
            'address.min' => 'The address you provided is too short!',
            'address2.max' => 'The second address you provided is too long!',
            'address2.min' => 'The second address you provided is too short!',
            'city.required' => 'Your City is required!',
            'city.max' => 'The City name your provided is too long!',
            'city.min' => 'The City name your provided is too short!',
            'province.required' => 'Your Province is required!',
            'province.max' => 'The Province name you provided is too long!',
            'province.min' => 'The Province name you provided is too short!',
            'zipCode.required' => 'Your Zip Code is required!',
            'zipCode.number' => 'Zip Code must be a number!',
            'zipCode.min' => 'The Zip Code you provided is too short!',
            'country.required' => 'Your Country is required!',
            'country.max' => 'Invalid Country Code!',
            'country.min' => 'Invalid Country Code!',
        ];
    }
}
