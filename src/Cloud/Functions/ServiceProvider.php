<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Functions;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 *
 * @package Phpcast\TuyaCloudSdk\Cloud\Functionss
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['functions'] = function ($app) {
            return new Client($app);
        };
    }
}
