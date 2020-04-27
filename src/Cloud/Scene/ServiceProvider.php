<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Scene;

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
        $app['scene'] = function ($app) {
            return new Client($app);
        };
    }
}