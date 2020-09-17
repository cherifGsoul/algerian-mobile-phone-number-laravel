<?php

namespace Cherif\AlgerianMobilePhoneNumber\Laravel\Tests;

use Cherif\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber;
use Cherif\AlgerianMobilePhoneNumber\Laravel\Tests\Models\Customer;
use InvalidArgumentException;
use Orchestra\Testbench\TestCase;

class AlgerianMobilePhoneNumberCastTest extends TestCase
{
    public function testValueFromValidString()
    {
        $model = new Customer();
        $model->firstname = 'Cherif';
        $model->lastname = 'Bouchelaghem';
        $model->mobile_phone_number = '00213-6-99-00-00-00';
        $normalized = '00213699000000';
        $this->assertInstanceOf(AlgerianMobilePhoneNumber::class,  $model->mobile_phone_number);
        $this->assertEquals($normalized, (string)$model->mobile_phone_number);
    }

    public function testValueFromValueObject()
    {
        $model = new Customer();
        $model->firstname = 'Cherif';
        $model->lastname = 'Bouchelaghem';
        $model->mobile_phone_number = AlgerianMobilePhoneNumber::fromString('00213-6-99-00-00-00');
        $normalized = '00213699000000';
        $this->assertInstanceOf(AlgerianMobilePhoneNumber::class,  $model->mobile_phone_number);
        $this->assertEquals($normalized, (string)$model->mobile_phone_number);
    }

    public function testValueFromNull()
    {
        $model = new Customer();
        $model->firstname = 'Cherif';
        $model->lastname = 'Bouchelaghem';
        $model->mobile_phone_number = '';
        $mobileNumber = $model->mobile_phone_number;
        $this->assertNull($mobileNumber);
    }

    public function testFromInvalidString()
    {
        $this->expectException(InvalidArgumentException::class);
        $model = new Customer();
        $model->firstname = 'Cherif';
        $model->lastname = 'Bouchelaghem';
        $model->mobile_phone_number = 'foobarbaz';
    }
}
