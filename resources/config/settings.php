<?php

return [
    'test_mode'        => [
        'type' => 'anomaly.field_type.boolean'
    ],
    'username'         => [
        'type'   => 'anomaly.field_type.encrypted',
        'config' => [
            'show_text' => true
        ]
    ],
    'password'         => [
        'required' => true,
        'type'     => 'anomaly.field_type.encrypted'
    ],
    'signature'        => [
        'type'     => 'anomaly.field_type.encrypted'
    ],
    'solution_type'    => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'sole' => 'anomaly.extension.paypal_gateway::setting.solution_type.option.sole',
                'mark' => 'anomaly.extension.paypal_gateway::setting.solution_type.option.mark'
            ]
        ]
    ],
    'landing_page'     => [
        'type'   => 'anomaly.field_type.select',
        'config' => [
            'options' => [
                'billing' => 'anomaly.extension.paypal_gateway::setting.landing_page.option.billing',
                'login'   => 'anomaly.extension.paypal_gateway::setting.landing_page.option.login'
            ]
        ]
    ],
    'brand_name'       => [
        'type' => 'anomaly.field_type.text'
    ],
    'header_image_url' => [
        'type' => 'anomaly.field_type.url'
    ],
    'border_color'     => [
        'type' => 'anomaly.field_type.url'
    ]
];

