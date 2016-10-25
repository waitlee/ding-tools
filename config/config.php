<?php

return [
    'default' => 'app',

    'dingConnections' => [
        'app' => [
            'corp_id' => env('CORP_ID', 'corp id'),
            'corp_secert' => env('CORP_SECERT', 'corp secert'),
            'format' => 'json'
        ]
    ]
]