<?php
declare(strict_types=1);

namespace Bjyyb\JWT\Contract;

use Bjyyb\JWT\Configuration;

/**
 * Note: JwtInterface
 * Author: nf
 * Time: 2020/11/16 11:22
 */
interface JwtInterface
{
    /**
     * 生成jwt令牌
     * @param Configuration $configuration
     * @return string
     * Author: nf
     * Time: 2020/11/16 23:05
     */
    public function encrypt(Configuration $configuration): string;

    /**
     * jwt令牌解码
     * @param string $jwt
     * @param Configuration $configuration
     * @return object
     * Author: nf
     * Time: 2020/11/16 23:06
     */
    public function decrypt(string $jwt, Configuration $configuration): object;
}