<?php
declare(strict_types=1);

namespace Bjyyb\JWT;

use Bjyyb\JWT\Contract\JwtInterface;
use Bjyyb\JWT\Factory\ConfigurationFactory;
use Psr\Container\ContainerInterface;

/**
 * Note: jwt服务
 * Author: nf
 * Time: 2020/11/16 17:27
 */
class JwtService
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * @var JwtInterface
     */
    protected $jwt;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->jwt = $container->get(JwtInterface::class);
    }

    /**
     * 获取jwt令牌
     * @param array $data 自定义数组
     * @param string $poolName 配置名称
     * @return string
     * Author: nf
     * Time: 2020/11/16 17:40
     */
    public function get(array $data, string $poolName = 'default'): string
    {
        $configuration = $this->getConfiguration($poolName);

        if ($configuration->getPayload('exp')) {
            $configuration->setPayload('exp', time() + $configuration->getPayload('exp'));
        }

        $configuration->setPayload($data);

        return $this->jwt->encrypt($configuration);

    }

    /**
     * 解析jwt令牌
     * @param string $jwt 令牌
     * @param string $poolName 配置名称
     * @return object
     * Author: nf
     * Time: 2020/11/16 17:40
     */
    public function parse(string $jwt, string $poolName = 'default'): object
    {
        $configuration = $this->getConfiguration($poolName);

        return $this->jwt->decrypt($jwt, $configuration);
    }

    /**
     * 获取配置对象
     * @param string $name
     * @return Configuration
     * Author: nf
     * Time: 2020/11/16 17:37
     */
    protected function getConfiguration(string $name): Configuration
    {
        $configurationName = ConfigurationFactory::class . '.' . $name;

        if ($this->container->has($configurationName)) {
            $configuration = $this->container->get($configurationName);
        } else {
            $configuration = make(ConfigurationFactory::class)($this->container, $name);
            $this->container->set($configurationName, $configuration);
        }

        return $configuration;
    }

}