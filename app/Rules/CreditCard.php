<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CreditCard implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->validateCard($value))
            $fail('Invalid Credit Card number!');
    }

    /*
     * Run through all the regex to check if any match the given number
     * if not then the card is not valid
     */
    private function validateCard($number): bool
    {
        $cardValid = false;
        $cardtypes = array(
            "visa" => "/^(?:4[0-9]{12}(?:[0-9]{3})?)$/",
            "masterCard" => "/^(?:5[1-5][0-9]{14})$/",
            "americanExpress" => "/^(?:3[47][0-9]{13})$/",
        );

        foreach ($cardtypes as $cardtype)
            if (preg_match($cardtype, $number))
                $cardValid = true;

        return $cardValid;
    }
}
