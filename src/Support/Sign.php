<?php

namespace Phpcast\TuyaCloudSdk\Support;

class Sign
{
    public function generateTokenSign(\Phpcast\TuyaCloudSdk\Kernel\Config $config, $t)
    {
        $clientId = $config->get('client_id');
        $secret = $config->get('secret');

        return mb_strtoupper(hash_hmac('sha256', $clientId.$t, $secret, false));
    }

    public function generateProfessionSign(\Phpcast\TuyaCloudSdk\Kernel\Config $config, $accessToken, $t)
    {
        $clientId = $config->get('client_id');
        $secret = $config->get('secret');

        return mb_strtoupper(hash_hmac('sha256', $clientId.$accessToken.$t, $secret, false));
    }
}
