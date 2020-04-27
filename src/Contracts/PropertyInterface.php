<?php

namespace Phpcast\TuyaCloudSdk\Contracts;

/**
 * Interface PropertyInterface
 *
 * @package Phpcast\TuyaCloudSdk\Contracts
 */
interface PropertyInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return mixed
     */
    public function transformForRequest(): array;
}