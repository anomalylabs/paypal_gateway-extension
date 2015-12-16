<?php

return [
    'test_mode' => [
        'type' => 'anomaly.field_type.boolean'
    ],
    'username'  => [
        'type'   => 'anomaly.field_type.encrypted',
        'config' => [
            'show_text' => true
        ]
    ],
    'password'  => [
        'required' => true,
        'type'     => 'anomaly.field_type.encrypted'
    ],
    'signature' => [
        'type' => 'anomaly.field_type.encrypted'
    ]
];

