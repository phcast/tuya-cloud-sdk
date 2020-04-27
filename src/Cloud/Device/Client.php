<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Device;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取设备详情.
     *
     * @param $device_id
     *
     * @return array
     */
    public function detail($device_id)
    {
        return $this->httpGet("devices/{$device_id}");
    }

    /**
     * 获取用户下设备列表.
     *
     * @param $uid
     *
     * @return array
     */
    public function userDevice($uid)
    {
        return $this->httpGet("users/{$uid}/devices");
    }

    /**
     * 获取设备列表.
     *
     * @param int  $page_no
     * @param int  $page_size
     * @param null $schema
     * @param null $product_id
     * @param null $device_ids
     *
     * @return array
     */
    public function devices(int $page_no, int $page_size, $schema = null, $product_id = null, $device_ids = null)
    {
        $query = [
            'page_no' => $page_no,
            'page_size' => $page_size,
            'product_id' => $product_id,
            'device_ids' => $device_ids,
            'schema' => $schema,
        ];

        return $this->httpGet('devices', $query);
    }

    /**
     * 修改功能点名称.
     *
     * @param $device_id
     * @param $function_code
     * @param $name
     *
     * @return array
     */
    public function updateDeviceFunction($device_id, $function_code, $name)
    {
        $params = [
            'function_code' => $function_code,
        ];

        return $this->httpPostJson("devices/{$device_id}/functions/{$function_code}", $params);
    }

    /**
     * 查询设备日志.
     *
     * @param      $device_id
     * @param      $type
     * @param int  $start_time
     * @param int  $end_time
     * @param null $codes
     * @param null $start_row_key
     * @param null $last_row_key
     * @param null $last_event_time
     * @param null $size
     * @param null $query_type
     *
     * @return array
     */
    public function logs($device_id, $type, int $start_time, int $end_time, $codes = null, $start_row_key = null, $last_row_key = null, $last_event_time = null, $size = null, $query_type = null)
    {
        $params = [
            'type' => $type,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'codes' => $codes,
            'start_row_key' => $start_row_key,
            'last_row_key' => $last_row_key,
            'last_event_time' => $last_event_time,
            'size' => $size,
            'query_type' => $query_type,
        ];

        return $this->httpGet("devices/{$device_id}/logs", $params);
    }

    /**
     * 恢复设备出厂设置.
     *
     * @param $device_id
     *
     * @return array
     */
    public function resetFactory($device_id)
    {
        return $this->httpPut("devices/{$device_id}/reset-factory");
    }

    /**
     * 移除设备.
     *
     * @param $device_id
     *
     * @return array
     */
    public function delete($device_id)
    {
        return $this->httpDelete("devices/{$device_id}");
    }

    /**
     * 查询网关下的设备列表.
     *
     * @param $device_id
     *
     * @return array
     */
    public function subDevices($device_id)
    {
        return $this->httpGet("devices/{$device_id}/sub-devices");
    }

    /**
     * 查询设备出厂信息.
     *
     * @param $device_ids
     *
     * @return array
     */
    public function factoryInfos($device_ids)
    {
        $query = [
            'device_ids' => $device_ids,
        ];

        return $this->httpGet('devices/factory-infos', $query);
    }

    /**
     * 修改设备名称.
     *
     * @param $device_id
     * @param $name
     *
     * @return array
     */
    public function updateDevice($device_id, $name)
    {
        $params = [
            'name' => $name,
        ];

        return $this->httpPut("devices/{$device_id}", [], $params);
    }
}
