<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Network;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['network'] = function ($app) {
            return new Client($app);
        };
    }
}
