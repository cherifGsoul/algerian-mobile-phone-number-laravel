<?php

namespace Cherif\AlgerianMobilePhoneNumber\Laravel\Tests;

use Cherif\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber;
use Cherif\AlgerianMobilePhoneNumber\Laravel\Tests\Models\Customer;
use InvalidArgumentException;
use Orchestra\Testbench\TestCase;

class AlgerianMobilePhoneNumberCastTest extends TestCase
{
    protected $model;
    protected $normalized;

    public function setUp() : void
    {
        parent::Setup();
        $this->model = new Customer();
        $this->model->firstname = 'Cherif';
        $this->model->lastname = 'Bouchelaghem';
        $this->model->mobile_phone_number = '00213-6-99-00-00-00';
        $this->normalized = '00213699000000';
    }

    public function testValueFromValidString()
    {
        $this->assertInstanceOf(AlgerianMobilePhoneNumber::class,  $this->model->mobile_phone_number);
        $this->assertEquals($this->normalized, (string)$this->model->mobile_phone_number);
    }

    public function testValueFromValueObject()
    {
        $this->model->mobile_phone_number = AlgerianMobilePhoneNumber::fromString('00213-6-99-00-00-00');
        $this->assertInstanceOf(AlgerianMobilePhoneNumber::class,  $this->model->mobile_phone_number);
        $this->assertEquals($this->normalized, (string)$this->model->mobile_phone_number);
    }

    public function testValueFromNull()
    {
        $this->model->mobile_phone_number = '';
        $mobileNumber = $this->model->mobile_phone_number;
        $this->assertNull($mobileNumber);
    }

    public function testFromInvalidString()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->model->mobile_phone_number = 'foobarbaz';
    }
}
