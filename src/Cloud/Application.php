<?php

namespace Phpcast\TuyaCloudSdk\Cloud;

use Phpcast\TuyaCloudSdk\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \Phpcast\TuyaCloudSdk\Cloud\Auth\AccessToken $access_token
 * @property \Phpcast\TuyaCloudSdk\Cloud\User\Client $user
 * @property \Phpcast\TuyaCloudSdk\Cloud\Network\Client $network
 * @property \Phpcast\TuyaCloudSdk\Cloud\Functions\Client $functions
 * @property \Phpcast\TuyaCloudSdk\Cloud\Timing\Client $timming
 * @property \Phpcast\TuyaCloudSdk\Cloud\Home\Client $home
 * @property \Phpcast\TuyaCloudSdk\Cloud\Scene\Client $scene
 * @property \Phpcast\TuyaCloudSdk\Cloud\Statistics\Client $statistics
 * @property \Phpcast\TuyaCloudSdk\Cloud\Skill\Client $skill
 * @property \Phpcast\TuyaCloudSdk\Cloud\Weather\Client $weather
 * @property \Phpcast\TuyaCloudSdk\Cloud\Ota\Client $ota
 * @property \Phpcast\TuyaCloudSdk\Cloud\Group\Client $group
 * @property \Phpcast\TuyaCloudSdk\Cloud\Country\Client $country
 * @property \Phpcast\TuyaCloudSdk\Cloud\Proprietary\Client $proprietary
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Auth\ServiceProvider::class,
        User\ServiceProvider::class,
        Network\ServiceProvider::class,
        Functions\ServiceProvider::class,
        Timing\ServiceProvider::class,
        Home\ServiceProvider::class,
        Scene\ServiceProvider::class,
        Statistics\ServiceProvider::class,
        Skill\ServiceProvider::class,
        Weather\ServiceProvider::class,
        Ota\ServiceProvider::class,
        Group\ServiceProvider::class,
        Country\ServiceProvider::class,
        Proprietary\ServiceProvider::class,
    ];
}
