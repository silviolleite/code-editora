<?php

return [
    'email' => [
        'user_created' => [
            'subject' => config('app.name').' - Sua conta foi criada'
        ]
    ],
    'middleware' => [
        'isVerified' => 'isVerified'
    ],
    'user_default' => [
        'name' => env('USER_NAME', 'Administrator'),
        'email' => env('USER_EMAIL', 'admin@admin.com'),
        'password' => env('USER_PASSWORD', 'secret')
    ],
    'acl' => [
        'role_admin' => env('ROLE_ADMIN', 'Admin')
    ]
];
