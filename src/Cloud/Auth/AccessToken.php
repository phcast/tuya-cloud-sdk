<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Auth;

use Phpcast\TuyaCloudSdk\Kernel\AccessToken as BaseAccessToken;

class AccessToken extends BaseAccessToken
{
    /**
     * @var string
     */
    protected $endpoint = 'https://openapi.tuyacn.com';

    /**
     * @return array
     */
    protected function getCredentials(): array
    {
        return [
            'grant_type' => '1',
        ];
    }

    protected function getHeaders(): array
    {
        $t = get_total_millisecond();
        $sign = $this->app['sign']->generateTokenSign($this->app['config'], $t);

        return [
            'client_id' => $this->app['config']['client_id'],
            'sign' => $sign,
            't' => $t,
            'sign_method' => 'HMAC-SHA256',
        ];
    }
}
