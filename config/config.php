<?php
/**
 * 钉钉 SDK 配置文件
 *
 * Copyright waitlee<liduabc2012@gmail.com>
 */
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