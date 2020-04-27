<?php

namespace Phpcast\TuyaCloudSdk\Kernel\Providers;

use Phpcast\TuyaCloudSdk\Support\Sign;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SignServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['sign'] = function ($app) {
            return new Sign();
        };
    }
}