<?php

namespace App\Http\Requests;

use App\Rules\CreditCard;
use App\Rules\ExpirationDate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

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
            'card_holder_name' => 'required|max:150|min:3',
            'card_number' => ['required', 'numeric', new CreditCard],
            'card_exp_date' => ['required', new ExpirationDate],
            'card_sec_code' => 'required|numeric'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        // !! SHOULD RETURN CHECKOUT PAGE WITH FLASH SESSION ERRORS INSTEAD
        $response = new JsonResponse(['errors' => $validator->errors()], 400);
        throw new HttpResponseException($response);
    }
}
