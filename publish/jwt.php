<?php

return [
    'default' => [
        // 签名算法
        'alg' => 'HS256',
        // 实体内容
        'payload' => [
            // 令牌签发者
            'iss' => 'JWT-server',
            // 令牌接收者
            'aud' => 'JWT-client',
            // 令牌主题
            'sub' => '/',
            // 令牌生效时间
            // 'nbf' => -1,
            // 令牌签发时间
            // 'iat' => -1,
            // 令牌失效时间 默认15分钟
            'exp' => 300,
            // 令牌id
            'jti' => 'hyperf-JWT',
        ],
        // 加密密钥
        'key' => 'hyperf-JWT',
        // 允许算法
        'allowed_algs' => ['HS256'],
    ],

];