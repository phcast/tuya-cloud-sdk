<?php

namespace Phpcast\TuyaCloudSdk\Contracts;

interface AccessTokenInterface
{
    /**
     * @return array
     */
    public function getToken(): array;

    /**
     * @return AccessTokenInterface
     */
    public function refresh(): self;
}
