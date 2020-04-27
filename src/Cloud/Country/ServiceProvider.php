<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Country;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 *
 * @package Phpcast\TuyaCloudSdk\Cloud\Statistics
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['country'] = function ($app) {
            return new Client($app);
        };
    }
}
