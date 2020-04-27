<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Statistics;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 数据概况.
     *
     * @param null $product_id
     *
     * @return array
     */
    public function survey($product_id = null)
    {
        $query = [
            'product_id' => $product_id,
        ];

        return $this->httpGet('statistics-datas-survey', $query);
    }

    /**
     * 统计App日注册用户数.
     *
     * @param $schema
     *
     * @return array
     */
    public function usersActiveData($schema, $date_type)
    {
        $query = [
            'date_type' => $date_type,
        ];

        return $this->httpGet("apps/{$schema}/users-active-datas", $query);
    }

    /**
     * 统计App日活跃用户数.
     *
     * @param $schema
     * @param $date_type
     *
     * @return array
     */
    public function usersLiveDatas($schema, $date_type)
    {
        $query = [
            'date_type' => $date_type,
        ];

        return $this->httpGet("apps/{$schema}/users-live-datas", $query);
    }

    /**
     * 获取App设备数据概况.
     *
     * @param $schema
     *
     * @return array
     */
    public function devicesSurvey($schema)
    {
        return $this->httpGet("apps/{$schema}/devices-survey", []);
    }

    /**
     * 获取设备总体概况.
     *
     * @param null $product_id
     *
     * @return array
     */
    public function datasSurvey($product_id = null)
    {
        $query = [
            'product_id' => $product_id,
        ];

        return $this->httpGet('devices/datas-survey', $query);
    }

    /**
     * 获取活跃设备地区分布数据.
     *
     * @param      $date_type
     * @param      $type
     * @param      $limit
     * @param null $productId
     *
     * @return array
     */
    public function locationsLiveDatas($date_type, $type, $limit, $productId = null)
    {
        $query = [
            'date_type' => $date_type,
            'type' => $type,
            'limit' => $limit,
            'productId' => $productId,
        ];

        return $this->httpGet('devices/locations-live-datas', $query);
    }

    /**
     * 获取激活设备地区分布详情数据.
     *
     * @param      $date_type
     * @param      $type
     * @param      $limit
     * @param null $productId
     *
     * @return array
     */
    public function locationsActivedatas($date_type, $type, $limit, $productId = null)
    {
        $query = [
            'date_type' => $date_type,
            'type' => $type,
            'limit' => $limit,
            'productId' => $productId,
        ];

        return $this->httpGet('devices/locations-active-datas', $query);
    }

    /**
     * 统计设备日活跃数.
     *
     * @param $date_type
     * @param $product_id
     *
     * @return array
     */
    public function liveDatas($date_type, $product_id = null)
    {
        $query = [
            'date_type' => $date_type,
            'product_id' => $product_id,
        ];

        return $this->httpGet('devices/live-datas', $query);
    }

    /**
     * 统计设备日激活数.
     *
     * @param      $date_type
     * @param null $product_id
     *
     * @return arrayiii
     */
    public function activeDatas($date_type, $product_id = null)
    {
        $query = [
            'date_type' => $date_type,
            'product_id' => $product_id,
        ];

        return $this->httpGet('devices/active-datas', $query);
    }

    /**
     * 统计设备日共激活数据.
     *
     * @param      $date_type
     * @param null $product_id
     *
     * @return array
     */
    public function accumulateActiveDatas($date_type, $product_id = null)
    {
        $query = [
            'date_type' => $date_type,
            'product_id' => $product_id,
        ];

        return $this->httpGet('devices/accumulate-active-datas', $query);
    }

    /**
     * 获取设备活跃数据概况.
     *
     * @param null $product_id
     *
     * @return array
     */
    public function liveDatasSurvey($product_id = null)
    {
        $query = [
            'product_id' => $product_id,
        ];

        return $this->httpGet('devices/live-datas-survey', $query);
    }

    /**
     * 获取设备激活数据概况.
     *
     * @param null $product_id
     *
     * @return array
     */
    public function activeDatasSurvey($product_id = null)
    {
        $query = [
            'product_id' => $product_id,
        ];

        return $this->httpGet('devices/active-datas-survey', $query);
    }

    /**
     * 获取历史累计值
     *
     * @param $device_id
     * @param $code
     *
     * @return array
     */
    public function total($device_id, $code)
    {
        $query = [
            'code' => $code,
        ];

        return $this->httpGet("devices/{$device_id}/statistic/total", $query);
    }

    /**
     * 获取设备支持的统计类型.
     *
     * @param      $dev_id
     * @param null $code
     *
     * @return array
     */
    public function allStatisticType($dev_id, $code = null)
    {
        $query = [
            'code' => $code,
        ];

        return $this->httpGet("devices/{$dev_id}/all-statistic-type", $query);
    }

    /**
     * 按分钟统计
     *
     * @param $dev_id
     * @param $code
     * @param $start_minute
     * @param $end_minute
     *
     * @return array
     */
    public function quarters($dev_id, $code, $start_minute, $end_minute)
    {
        $query = [
            'code' => $code,
            'start_minute' => $start_minute,
            'end_minute' => $end_minute,
        ];

        return $this->httpGet("devices/{$dev_id}/statistics/quarters", $query);
    }

    /**
     * 按小时统计
     *
     * @param $dev_id
     * @param $code
     * @param $start_hour
     * @param $end_hour
     * @param $stat_type
     *
     * @return array
     */
    public function hours($dev_id, $code, $start_hour, $end_hour, $stat_type)
    {
        $query = [
            'code' => $code,
            'start_hour' => $start_hour,
            'end_hour' => $end_hour,
            'stat_type' => $stat_type,
        ];

        return $this->httpGet("devices/{$dev_id}/statistics/hours", $query);
    }

    /**
     * 按天统计累计值
     *
     * @param      $device_id
     * @param      $code
     * @param      $start_day
     * @param      $end_day
     * @param null $stat_type
     *
     * @return array
     */
    public function days($device_id, $code, $start_day, $end_day, $stat_type = null)
    {
        $query = [
            'code' => $code,
            'start_day' => $start_day,
            'end_day' => $end_day,
            'stat_type' => $stat_type,
        ];

        return $this->httpGet("devices/{$device_id}/statistics/days", $query);
    }

    /**
     * 按星期统计累计值
     *
     * @param $device_id
     * @param $code
     * @param $start_week
     * @param $end_week
     *
     * @return array
     */
    public function weeks($device_id, $code, $start_week, $end_week)
    {
        $query = [
            'code' => $code,
            'start_week' => $start_week,
            'end_week' => $end_week,
        ];

        return $this->httpGet("devices/{$device_id}/weeks/statistics", $query);
    }

    /**
     * 按月统计累计值
     *
     * @param $device_id
     * @param $code
     * @param $start_month
     * @param $end_month
     *
     * @return array
     */
    public function months($device_id, $code, $start_month, $end_month)
    {
        $query = [
            'code' => $code,
            'start_month' => $start_month,
            'end_month' => $end_month,
        ];

        return $this->httpGet("devices/{$device_id}/statistics/months", $query);
    }
}
