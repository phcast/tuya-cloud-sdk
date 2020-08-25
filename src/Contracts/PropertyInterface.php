<?php

namespace Phpcast\TuyaCloudSdk\Contracts;

/**
 * Interface PropertyInterface.
 */
interface PropertyInterface
{
    public function getType(): string;

    /**
     * @return mixed
     */
    public function transformForRequest(): array;
}
