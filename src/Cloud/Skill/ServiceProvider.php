<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Skill;

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
        $app['skill'] = function ($app) {
            return new Client($app);
        };
    }
}