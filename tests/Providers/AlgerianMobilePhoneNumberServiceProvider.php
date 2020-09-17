<?php

namespace Cherif\AlgerianMobilePhoneNumber\Laravel\Tests\Providers;

use Illuminate\Support\ServiceProvider;

class AlgerianMobilePhoneNumberServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public  function boot()
    {
        $this->loadMigrationsFrom(dirname(__DIR__).'/migrations');
    }
}
