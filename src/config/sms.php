<?php

return [

    'default' => env('SMS_PROVIDER', 'ippanel'),

    'providers' => [
        'ippanel' => [
            'provider' => 'ippanel',
            'api_key' => env('SMS_API_KEY'),
            'number' => env('SMS_NUMBER'),
        ]
    ]
];