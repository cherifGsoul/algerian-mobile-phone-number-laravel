<?php

namespace Cherif\AlgerianMobilePhoneNumber\Laravel\Casts;

use Cherif\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber;
use Cherif\AlgerianMobilePhoneNumber\InvalidAlgerianMobilePhoneNumberException;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use InvalidArgumentException;

class AlgerianMobilePhoneNumberCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        if ($value === null || $value === '') {
            return null;
        }

        if ($value instanceof AlgerianMobilePhoneNumber) {
            return $value;
        }

        if (is_string($value)) {
            try {
                $value = AlgerianMobilePhoneNumber::fromString($value);
            } catch (InvalidAlgerianMobilePhoneNumberException $e) {
                throw new InvalidArgumentException($e->getMessage());
            }
        }

        return $value;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, $key, $value, $attributes)
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_string($value)) {
            try {
                $value = AlgerianMobilePhoneNumber::fromString($value);
            } catch (InvalidAlgerianMobilePhoneNumberException $e) {
                throw new InvalidArgumentException($e->getMessage());
            }
        }

        return (string) $value;
    }
}
