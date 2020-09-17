# cherif/algerian-mobile-phone-number-laravel

Allows to use [cherif/algerian-mobile-phone-number](https://github.com/cherifGsoul/php-algerian-mobile-phone-number) value object with [Laravel](https://laravel.com/).


## Installtion
The recommended way of installation is by using [Packagist](https://packagist.org/packages/cherif/algerian-mobile-phone-number-laravel) and [Composer](http://getcomposer.org/).

The following command should be executed in order to add the package as a requirement to `composer.json` of a project:

```shell
$ composer require cherif/algerian-mobile-phone-number-laravel
```

## Usage:

The package have 2 main classes to use `Cherif\AlgerianMobilePhoneNumber\Laravel\Casts\AlgerianMobilePhoneNumberCast` and `Cherif\AlgerianMobilePhoneNumber\Laravel\Rules\AlgerianMobilePhoneNumberRule` to cast models attributes from/to the phone number value object and validate the request respectively:

### Eloquent model attribute casting:

To use `Cherif\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber\AlgerianMobilePhoneNumber` value object instance as Eloquent model attribute use the casting class in the `casts` model's property like the following:

```php

namespace App\Models;

use Cherif\AlgerianMobilePhoneNumber\Laravel\Casts\AlgerianMobilePhoneNumberCast;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $casts = [
        'mobile_phone_number' => AlgerianMobilePhoneNumberCast::class
    ];
}
```

The definition above allows to use the `mobile_phone_number` as value object when reading the attribute, the casting to string value will be handled during setting the value and persisting the model in the database.

### Validation:

The mobile phone validator is `Cherif\AlgerianMobilePhoneNumber\Laravel\Rules\AlgerianMobilePhoneNumberRule` it can be used with the request's to validate the input:

```php
use Cherif\AlgerianMobilePhoneNumber\Laravel\Rules\AlgerianMobilePhoneNumberRule;

// ... 

/**
 * Store a new customer.
 *
 * @param  Request  $request
 * @return Response
 */
public function store(Request $request)
{
    $validatedData = $request->validate([
        'mobilePhoneNumber' => ['required', new AlgerianMobilePhoneNumberRule],
    ]);

    // The customer is valid...
}
```

## Contribution
Contributions are welcome to make this library better.

- Clone the repo:

```shell
$ git clone git@github.com:cherifGsoul/algerian-mobile-phone-laravel.git
```

and enter to the cloned repository directory.

- Install dependencies:

```shell
$ composer install
```

### Testing:

```shell
$ ./vendor/bin/phpunit
```

## License

[MIT License](LICENSE).
