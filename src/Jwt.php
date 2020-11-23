<?php
declare(strict_types=1);

namespace Bjyyb\JWT;

use Bjyyb\JWT\Contract\JwtInterface;
use Firebase\JWT\JWT as JWTService;

/**
 * Note: Jwt
 * Author: nf
 * Time: 2020/11/16 11:24
 */
class Jwt implements JwtInterface
{
    /**
     * 获取jwt令牌
     * @param Configuration $configuration
     * @return string
     * Author: nf
     * Time: 2020/11/16 13:50
     */
    public function encrypt(Configuration $configuration): string
    {
        return JWTService::encode($configuration->getPayload(), $configuration->getKey(), $configuration->getAlg());
    }

    /**
     * 解析jwt令牌
     * @param string $jwt
     * @param Configuration $configuration
     * @return object
     * Author: nf
     * Time: 2020/11/16 13:50
     */
    public function decrypt(string $jwt, Configuration $configuration): object
    {
        return JWTService::decode($jwt, $configuration->getKey(), $configuration->getAllowedAlgs());
    }
}