<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Country;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取全球国家码列表.
     *
     * @return array
     */
    public function allCountries()
    {
        return $this->httpGet('all-countries');
    }
}
