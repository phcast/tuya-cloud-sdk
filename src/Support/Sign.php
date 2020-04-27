<?php

namespace Phpcast\TuyaCloudSdk\Support;

class Sign
{
    public function generateTokenSign(Config $config, $t)
    {
        $clientId = $config->get('client_id');
        $secret = $config->get('secret');
        return mb_strtoupper(hash_hmac('sha256', $clientId.$t, $secret, false));
    }

    public function generateProfessionSign(Config $config,$accessToken,$t)
    {
        $clientId = $config->get('client_id');
        $secret = $config->get('secret');

        return mb_strtoupper(hash_hmac('sha256', $clientId.$accessToken.$t, $secret, false));
    }
}