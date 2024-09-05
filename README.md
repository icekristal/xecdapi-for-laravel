# xecdapi-for-laravel
## Documentation: https://xecdapi.xe.com/docs/v1
install:
```php
composer require icekristal/xecdapi-for-laravel
```

add config services.php:
```php
    'xecdapi' => [
        'auth' => [
            'username' => env('XECD_USERNAME'),
            'password' => env('XECD_PASSWORD'),
        ],
        'base_url' => env('XECD_URL', 'https://xecdapi.xe.com'),
    ],
```
config:

```php
php artisan vendor:publish --provider="Icekristal\XecdapiForLaravel\XecdapiServiceProvider" --tag="config"
```

use:
```php
use Icekristal\XecdapiForLaravel\Facades;

Xecdapi::getAccountInfo();

$needParams = [
    'from' => 'USD', //example
    'to' => 'EUR', //example
    'amount' => 1, //example
];

Xecdapi::setQueryParams($needParams)->getCurrencies();
Xecdapi::setQueryParams($needParams)->convertFrom();
Xecdapi::setQueryParams($needParams)->convertTo();
Xecdapi::setQueryParams($needParams)->centralBankExchangeRate();

```
