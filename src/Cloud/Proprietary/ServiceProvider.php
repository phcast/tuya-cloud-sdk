<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Proprietary;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['Proprietary'] = function ($app) {
            return new Client($app);
        };
    }
}
