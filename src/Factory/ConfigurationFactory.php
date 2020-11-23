<?php
declare(strict_types=1);

namespace Bjyyb\JWT\Factory;


use Bjyyb\JWT\ConfigurationProxy;
use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

/**
 * Note: 配置对象工厂方法
 * Author: nf
 * Time: 2020/11/16 13:46
 */
class ConfigurationFactory
{
    protected $default = [
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
    ];
    /**
     * 默认配置方式
     * @var string
     */
    protected $defaultKey = 'default';

    public function __invoke(ContainerInterface $container, string $key = 'default')
    {
        $config = $container->get(ConfigInterface::class);
        $defaultConfig = $config->get('jwt.' . $key ?? $this->defaultKey, $this->default);
        return ConfigurationProxy::getInstance()
            ->setAlg($defaultConfig['alg'])
            ->setPayload($defaultConfig['payload'])
            ->setKey($defaultConfig['key'])
            ->setAllowedAlgs($defaultConfig['allowed_algs']);
    }

}