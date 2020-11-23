<?php
declare(strict_types=1);

namespace Bjyyb\JWT;


use Hyperf\Utils\Context;

/**
 * Note: jwt配置信息提供代理
 * Author: nf
 * Time: 2020/11/16 11:23
 */
class ConfigurationProxy
{

    /**
     * 获取配置对象
     * @return Configuration
     * Author: nf
     * Time: 2020/11/16 13:00
     */
    public static function getInstance()
    {
        $id = Configuration::class;
        return Context::getOrSet($id, new Configuration());
    }

}