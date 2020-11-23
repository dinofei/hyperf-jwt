<?php
declare(strict_types=1);

namespace Bjyyb\JWT;


/**
 * Note: jwt配置信息提供类
 * Author: nf
 * Time: 2020/11/16 11:23
 */
class Configuration
{
    /** @var array */
    protected $payload = [];
    /** @var string */
    protected $alg;
    /** @var string */
    protected $key;
    /** @var array  */
    protected $allowedAlgs = [];

    /**
     * 获取自定义内容
     * @param string|null $key
     * @param null $default
     * @return array
     * Author: nf
     * Time: 2020/11/16 13:06
     */
    public function getPayload(?string $key = null, $default = null)
    {
        return is_null($key) ? $this->payload : $this->payload[$key] ?? $default;
    }

    /**
     * 获取加密算法
     * @return string
     * Author: nf
     * Time: 2020/11/16 11:40
     */
    public function getAlg()
    {
        return $this->alg;
    }

    /**
     * 获取秘钥
     * @return string
     * Author: nf
     * Time: 2020/11/16 11:40
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * 获取允许算法
     * @return array
     * Author: nf
     * Time: 2020/11/16 11:40
     */
    public function getAllowedAlgs()
    {
        return $this->allowedAlgs;
    }

    /**
     * 设置自定义内容
     * @param $key
     * @param $value
     * @return $this
     * Author: nf
     * Time: 2020/11/16 11:40
     */
    public function setPayload($key, $value = null): Configuration
    {
        if (is_array($key)) {
            $this->payload = array_merge($this->payload, $key);
        } elseif (is_string($key)) {
            $this->payload[$key] = $value;
        }
        return $this;
    }

    /**
     * 设置加密算法
     * @param string $alg
     * @return $this
     * Author: nf
     * Time: 2020/11/16 11:40
     */
    public function setAlg(string $alg): Configuration
    {
        $this->alg = $alg;
        return $this;
    }

    /**
     * 设置秘钥
     * @param string $key
     * @return $this
     * Author: nf
     * Time: 2020/11/16 11:40
     */
    public function setKey(string $key): Configuration
    {
        $this->key = $key;
        return $this;
    }

    /**
     * 设置允许算法支持
     * @param array $allowedAlgs
     * @return $this
     * Author: nf
     * Time: 2020/11/16 11:40
     */
    public function setAllowedAlgs(array $allowedAlgs): Configuration
    {
        $this->allowedAlgs = $allowedAlgs;
        return $this;
    }

}