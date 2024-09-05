<?php

return [
    'xecdapi' => [
        'auth' => [
            'username' => env('XECD_USERNAME'),
            'password' => env('XECD_PASSWORD'),
        ],
        'base_url' => env('XECD_URL', 'https://xecdapi.xe.com'),
    ],
];
