<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Ota;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取设备的升级信息.
     *
     * @param $device_id
     *
     * @return array
     */
    public function upgradeInfos($device_id)
    {
        return $this->httpGet("devices/{$device_id}/upgrade-infos");
    }

    /**
     * 确认设备升级.
     *
     * @param $device_id
     *
     * @return array
     */
    public function confirmUpgrade($device_id, $module_type)
    {
        $parpams = [
            'module_type' => $module_type,
        ];

        return $this->httpPut("devices/{$device_id}/confirm-upgrade", [], $parpams);
    }
}
