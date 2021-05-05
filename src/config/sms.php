<?php

return [

    'default' => env('SMS_PROVIDER', 'max-sms'),

    'providers' => [
        'max-sms' => [
            'provider' => 'MaxSms',
            'username' => env('SMS_USERNAME'),
            'password' => env('SMS_PASSWORD'),
            'number' => env('SMS_NUMBER'),
        ]
    ]
];