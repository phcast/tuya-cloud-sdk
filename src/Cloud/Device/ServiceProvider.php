<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Device;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['device'] = function ($app) {
            return new Client($app);
        };
    }
}
