<?php

namespace Cherif\AlgerianMobilePhoneNumber\Laravel\Tests\Models;

use Cherif\AlgerianMobilePhoneNumber\Laravel\Casts\AlgerianMobilePhoneNumberCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $casts = [
        'mobile_phone_number' => AlgerianMobilePhoneNumberCast::class
    ];
}
