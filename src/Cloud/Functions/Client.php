<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Functions;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 按品类获取指令集.
     *
     * @param $category
     *
     * @return arrays
     */
    public function category($category)
    {
        $params = [
        ];

        return $this->httpGet("functions/{$category}", $params);
    }

    /**
     * 获取指令集（按设备）.
     *
     * @param $device_id
     *
     * @return array
     */
    public function functions($device_id)
    {
        $params = [];

        return $this->httpGet("devices/{$device_id}/functions", $params);
    }

    /**
     * 获取设备规格属性（包含指令集、状态集）.
     *
     * @param $device_id
     *
     * @return array
     */
    public function specifications($device_id)
    {
        $params = [];

        return $this->httpGet("devices/{$device_id}/specifications", $params);
    }

    /**
     * 下发设备指令.
     *
     * @return array
     */
    public function commands(string $device_id, array $commands)
    {
        $params = [
            'commands' => $commands,
        ];

        return $this->httpPostJson("devices/{$device_id}/commands", $params);
    }

    /**
     * 获取设备最新状态
     *
     * @param $device_id
     *
     * @return array
     */
    public function status($device_id)
    {
        $params = [];

        return $this->httpGet("devices/{$device_id}/status", $params);
    }
}
