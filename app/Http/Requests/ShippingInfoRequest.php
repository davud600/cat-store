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
            'fullName' => 'required|max:150',
            'email' => 'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Your Full Name is required.',
            'fullName.max' => 'The name you provided is too long.',
            'email.required' => 'Your E-mail is required.',
            'email.email' => 'Please provide a valid e-mail.',
            'email.max' => 'Them E-mail you provided is too long.'
        ];
    }
}
