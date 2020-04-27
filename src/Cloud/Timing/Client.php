<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Timing;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 设备添加定时任务
     * @param $device_id
     * @param $category
     * @param $loops
     * @param $time_zone
     * @param $timezone_id
     * @param $instruct
     *
     * @return arrays
     */
    public function timers($device_id, $category, $loops, $time_zone, $timezone_id, $instruct)
    {
        $parmas = [
            'category' => $category,
            'loops' => $loops,
            'time_zone' => $time_zone,
            'timezone_id' => $timezone_id,
            'instruct' => $instruct,
        ];

        return $this->httpPostJson("devices/{$device_id}/timers", $parmas);
    }

    /**
     * 查询设备下的定时任务列表
     * @param string $device_id
     *
     * @return array
     */
    public function getTimers(string $device_id)
    {
        $parmas = [];

        return $this->httpGet("devices/{$device_id}/timers", $parmas);
    }

    /**
     * 获取设备某一个分类下⾯的定时任务信息
     * @param string $device_id
     * @param        $category
     *
     * @return array
     */
    public function category(string $device_id, $category)
    {
        $parmas = [];

        return $this->httpGet("devices/{$device_id}/timers/categories/{$category}", $parmas);
    }

    /**
     * 更新设备的某⼀个定时任务组的信息
     * @param $device_id
     * @param $group_id
     * @param $loops
     * @param $category
     * @param $time_zone
     * @param $timezone_id
     * @param $instruct
     *
     * @return array
     */
    public function groups($device_id, $group_id, $loops, $category, $time_zone, $timezone_id, $instruct)
    {
        $parmas = [
            'loops' => $loops,
            'category' => $category,
            'time_zone' => $time_zone,
            'timezone_id' => $timezone_id,
            'instruct' => $instruct,
        ];

        return $this->httpPostJson("devices/{$device_id}/timers/groups/{$group_id}", $parmas);
    }

    /**
     * 更新设备定时任务组的状态
     * @param $device_id
     * @param $group_id
     * @param $category
     * @param $value
     *
     * @return array
     */
    public function status($device_id, $group_id, $category, $value)
    {
        $parmas = [
            'value' => $value,
        ];

        return $this->httpPut("devices/{$device_id}/timers/categories/{$category}/groups/{$group_id}/status", [], $parmas);
    }

    /**
     * 删除设备下的所有定时任务
     * @param $device_id
     *
     * @return array
     */
    public function delete($device_id)
    {
        return $this->httpDelete("devices/{$device_id}/timers");
    }

    /**
     * 删除某个分类的定时任务
     * @param $device_id
     * @param $categories
     *
     * @return array
     */
    public function categoryDelete($device_id, $categories)
    {
        return $this->httpDelete("devices/{$device_id}/timers/categories/{$categories}");
    }

    /**
     * 删除某个分类下⾯的某个定时组的定时任务
     * @param $device_id
     * @param $categories
     * @param $group_id
     *
     * @return array
     */
    public function groupDelete($device_id, $categories, $group_id)
    {
        return $this->httpDelete("devices/{$device_id}/timers/categories/{$categories}/groups/{$group_id}");
    }

    /**
     * 获取设备群组下的定时任务
     * @param $device_group_id
     *
     * @return array
     */
    public function getBydeviceGroup($device_group_id)
    {
        $parmas = [];

        return $this->httpGet("device-groups/{$device_group_id}/timers", $parmas);
    }

    public function getBydeviceGroupAndCategory($device_group_id, $category)
    {
        $parmas = [];

        return $this->httpGet("device-groups/{$device_group_id}/timers/categories/{$category}", $parmas);
    }

    /**
     * 创建群组定时任务
     * @param $id
     * @param $category
     * @param $loops
     * @param $time_zone
     * @param $timezone_id
     * @param $instruct
     *
     * @return arrays
     */
    public function createDeviceGroups(
        $id, $category, $loops, $time_zone, $timezone_id, $instruct
    ) {
        $params = [
            'id' => $id,
            'category' => $category,
            'loops' => $loops,
            'time_zone' => $time_zone,
            'timezone_id' => $timezone_id,
            'instruct' => $instruct,
        ];

        return $this->httpPostJson('device-groups/timers', $params);
    }

    /**
     * 更新群组定时任务
     * @param $device_group_id
     * @param $group_id
     * @param $category
     * @param $loops
     * @param $time_zone
     * @param $timezone_id
     * @param $instruct
     *
     * @return array
     */
    public function updateDeviceGroups($device_group_id, $group_id, $category, $loops, $time_zone, $timezone_id, $instruct)
    {
        $params = [
            'category' => $category,
            'loops' => $loops,
            'time_zone' => $time_zone,
            'timezone_id' => $timezone_id,
            'instruct' => $instruct,
        ];

        return $this->httpPut("device-groups/{$device_group_id}/timers/groups/{$group_id}", [], $params);
    }

    /**
     * 更新群组分类定时任务
     * @param $device_group_id
     * @param $group_id
     * @param $category
     * @param $value
     *
     * @return array
     */
    public function updateDeviceGroupsAndCategory(
        $device_group_id, $group_id, $category, $value
    ) {
        $params = [
            'value' => $value,
        ];

        return $this->httpPut("device-groups/{$device_group_id}/timers/categories/{$category}/groups/{$group_id}/status", [], $params);
    }

    /**
     * 删除设备群组下的定时任务
     * @param $device_group_id
     *
     * @return array
     */
    public function deleteByDeviceGroups($device_group_id)
    {
        return $this->httpDelete("device-groups/{$device_group_id}/timers");
    }

    /**
     * 删除群组某个分类定时任务
     * @param $device_group_id
     * @param $category
     *
     * @return array
     */
    public function deleteByDeviceGroupsAndCategory($device_group_id, $category)
    {
        return $this->httpDelete("device-groups/{$device_group_id}/timers/categories/{$category}");
    }

    /**
     * 删除设备群组某个分类下的某个定时任务
     * @param $device_group_id
     * @param $category
     * @param $group_id
     *
     * @return array
     */
    public function deleteByDeviceGroupsAndCategoryAndGroup(
        $device_group_id, $category, $group_id
    ) {
        return $this->httpDelete("device-groups/{$device_group_id}/timers/categories/{$category}/groups/{$group_id}");
    }
}
