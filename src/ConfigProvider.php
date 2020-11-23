<?php


namespace Bjyyb\JWT;


use Bjyyb\JWT\Contract\JwtInterface;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => [
                JwtInterface::class => Jwt::class,
            ],
            'publish' => [
                [
                    'id' => 'jwt',
                    'description' => 'jwt参数配置',
                    'source' => __DIR__ . '/../publish/jwt.php',
                    'destination' => BASE_PATH . '/config/autoload/jwt.php',
                ],
            ],
        ];
    }


}