<?php

namespace Cherif\AlgerianMobilePhoneNumber\Laravel\Tests;

use Cherif\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber;
use Cherif\AlgerianMobilePhoneNumber\Laravel\Tests\Models\Customer;
use Cherif\AlgerianMobilePhoneNumber\Laravel\Tests\Providers\AlgerianMobilePhoneNumberServiceProvider;
use Illuminate\Support\Facades\DB;
use Orchestra\Testbench\TestCase;

class ModelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [AlgerianMobilePhoneNumberServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate',
                  ['--database' => 'testbench'])->run();
    }

    public function testPersistModelWithValueObject()
    {
        $value = AlgerianMobilePhoneNumber::fromString('00213-6-99-00-00-00');
        $model = new Customer();
        $model->firstname = 'Cherif';
        $model->lastname = 'Bouchelaghem';
        $model->mobile_phone_number = $value;
        $this->assertTrue($model->save());
        $this->assertInstanceOf(AlgerianMobilePhoneNumber::class, $model->mobile_phone_number);
        $row = DB::table('customers')->where('id', $model->id)->first();
        $this->assertEquals($row->mobile_phone_number, (string) $value);
    }

}
