<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Statistics;

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
        $app['statistics'] = function ($app) {
            return new Client($app);
        };
    }
}
