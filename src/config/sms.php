<?php

return [

    'default' => env('SMS_PROVIDER', 'IPPanel'),

    'providers' => [
        'IPPanel' => [
            'provider' => 'IPPanel',
            'api_key' => env('SMS_API_KEY'),
            'number' => env('SMS_NUMBER'),
        ]
    ]
];