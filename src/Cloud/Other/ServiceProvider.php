<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Other;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['other'] = function ($app) {
            return new Client($app);
        };
    }
}
