<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Group;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 查询设备群组列表
     * @param      $pid
     * @param      $owner_id
     * @param null $uid
     *
     * @return array
     */
    public function deviceGroup($pid, $owner_id, $uid = null)
    {
        $query = [
            'pid' => $pid,
            'owner_id' => $owner_id,
            'uid' => $uid,
        ];

        return $this->httpGet('device-groups', $query);
    }

    /**
     * 根据设备查询分享人列表
     * @param      $device_id
     * @param null $page
     * @param null $size
     * @param null $status
     *
     * @return array
     */
    public function userSharing($device_id, $page = null, $size = null, $status = null)
    {
        $query = [
            'page' => $page,
            'size' => $size,
            'status' => $status,
        ];

        return $this->httpGet("device-groups/{$device_id}/user-sharings", $query);
    }

    /**
     * 查询群组详情
     * @param $group_id
     *
     * @return array
     */
    public function detail($group_id)
    {
        return $this->httpGet("device-groups/{$group_id}");
    }

    /**
     * 查询群组列表
     * @param $uid
     *
     * @return array
     */
    public function userDeviceGroup($uid)
    {
        return $this->httpGet("users/{$uid}/device-groups");
    }

    /**
     * 创建群组列表
     * @param $uid
     * @param $name
     * @param $pid
     * @param $owner_id
     * @param $device_list
     *
     * @return array
     */
    public function createDeviceGroup($uid, $name, $pid, $owner_id, $device_list)
    {
        $params = [
            'uid' => $uid,
            'name' => $name,
            'pid' => $pid,
            'owner_id' => $owner_id,
            'device_list' => $device_list,
        ];

        return $this->httpPostJson('device-groups', $params);
    }

    /**
     * 更新群组分组
     * @param $group_id
     * @param $name
     * @param $device_list
     *
     * @return array
     */
    public function updateDeviceGroup($group_id, $name, $device_list)
    {
        $params = [
            'name' => $name,
            'device_list' => $device_list,
        ];

        return $this->httpPut("device-groups/{$group_id}", $params);
    }

    /**
     * 删除设备群组
     * @param $group_id
     *
     * @return array
     */
    public function deleteDeviceGroup($group_id)
    {
        return $this->httpDelete("device-groups/{$group_id}");
    }

    /**
     * 给设备群组下发指令
     * @param $device_group_id
     * @param $functions
     *
     * @return array
     */
    public function issued($device_group_id, $functions)
    {
        $params = [
            'functions' => $functions,
        ];

        return $this->httpPostJson("device-groups/{$device_group_id}/issued", $params);
    }
}
