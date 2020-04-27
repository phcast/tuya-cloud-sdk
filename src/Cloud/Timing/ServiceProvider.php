<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Timing;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 *
 * @package Phpcast\TuyaCloudSdk\Cloud\Timming
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['timming'] = function ($app) {
            return new Client($app);
        };
    }
}