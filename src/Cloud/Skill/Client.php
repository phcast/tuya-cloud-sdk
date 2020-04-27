<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Skill;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 发现用户下设备列表和场景列表.
     *
     * @param $uid
     *
     * @return array
     */
    public function discovery($uid)
    {
        return $this->httpGet("skills/users/{$uid}/discovery");
    }

    /**
     * 设备支持的技能.
     *
     * @param $device_identity
     *
     * @return array
     */
    public function devicesSkills($device_identity)
    {
        return $this->httpGet("skills/devices/{$device_identity}/skills");
    }

    /**
     * 设备技能状态查询.
     *
     * @param $device_identity
     *
     * @return array
     */
    public function status($device_identity)
    {
        return $this->httpGet("skills/devices/{$device_identity}/status");
    }

    /**
     * 技能纬度控制设备.
     *
     * @param $device_identity
     * @param $commands
     *
     * @return array
     */
    public function commands($device_identity, $commands)
    {
        $params = [
            'commands' => $commands,
        ];

        return $this->httpPostJson("skills/devices/{$device_identity}/commands", $params);
    }

    /**
     * 触发场景.
     *
     * @param $scene_id
     *
     * @return array
     */
    public function trigger($scene_id)
    {
        $params = [];

        return $this->httpPostJson("skills/scenes/{$scene_id}/trigger", $params);
    }
}
