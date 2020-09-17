<?php

namespace Cherif\AlgerianMobilePhoneNumber\Laravel\Rules;

use Cherif\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber;
use Cherif\AlgerianMobilePhoneNumber\InvalidAlgerianMobilePhoneNumberException;
use Illuminate\Contracts\Validation\Rule;

class AlgerianMobilePhoneNumberRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $isValid = true;

        try {
            AlgerianMobilePhoneNumber::fromString($value);
        } catch (InvalidAlgerianMobilePhoneNumberException $e) {
            $isValid = false;
        }

        return $isValid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute' . ' ' . __('is invalid mobile phone number!');
    }
}
