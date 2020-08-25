<?php

namespace Phpcast\TuyaCloudSdk\Contracts;

interface AccessTokenInterface
{
    public function getToken(): array;

    /**
     * @return AccessTokenInterface
     */
    public function refresh(): self;
}
