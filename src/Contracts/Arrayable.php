<?php

namespace Phpcast\TuyaCloudSdk\Contracts;

/**
 * Interface Arrayable
 *
 * @package Phpcast\TuyaCloudSdk\Contracts
 */
interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
}