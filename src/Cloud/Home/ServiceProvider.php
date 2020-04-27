<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Home;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['home'] = function ($app) {
            return new Client($app);
        };
    }
}
