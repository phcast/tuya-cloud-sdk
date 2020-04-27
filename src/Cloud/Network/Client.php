<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Network;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 生成配网令牌.
     *
     * @param string      $uid
     * @param string      $timeZoneId
     * @param string|null $owner_id
     * @param string|null $lon
     * @param string|null $lat
     * @param string|null $lang
     *
     * @return array
     */
    public function token(string $uid, string $timeZoneId, ?string $owner_id = null, ?string $lon = null, ?string $lat = null, ?string $lang = null)
    {
        $params = [
            'uid' => $uid,
            'timeZoneId' => $timeZoneId,
            'owner_id' => $owner_id,
            'lon' => $lon,
            'lat' => $lat,
            'lang' => $lang,
        ];

        return $this->httpPostJson('devices/token', $params);
    }

    /**
     * 获取配网设备列表.
     *
     * @param $pairToken
     *
     * @return array
     */
    public function tokens($pairToken)
    {
        $params = [
        ];

        return $this->httpGet("devices/tokens/{$pairToken}", $params);
    }

    /**
     * 开放网关允许子设备入网.
     *
     * @param        $device_id
     * @param string $duration
     *
     * @return array
     */
    public function enabledSubDiscovery($device_id, $duration = '')
    {
        $params = [
            'duration' => $duration,
        ];

        return $this->httpPut("devices/{$device_id}/enabled-sub-discovery", $params);
    }

    /**
     * 获取入网子设备列表.
     *
     * @param string   $device_id
     * @param int|null $discovery_time
     *
     * @return array
     */
    public function listSub(string $device_id, ?int $discovery_time = null)
    {
        $params = [
            'discovery_time' => $discovery_time,
        ];

        return $this->httpGet("devices/{$device_id}/list-sub", $params);
    }

    /**
     * 获取网关下的子设备列表.
     *
     * @param string $device_id
     *
     * @return array
     */
    public function subDevices(string $device_id)
    {
        $params = [
        ];

        return $this->httpGet("devices/{$device_id}/sub-devices", $params);
    }
}
