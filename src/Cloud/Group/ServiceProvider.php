<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Group;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['group'] = function ($app) {
            return new Client($app);
        };
    }
}
