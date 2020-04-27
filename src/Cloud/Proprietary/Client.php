<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Proprietary;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 普通遥控器配对.
     *
     * @param $infrared_id
     *
     * @return array
     */
    public function infraredCategory($infrared_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/categories");
    }

    /**
     * 获取指定类型品牌列表.
     *
     * @param $infrared_id
     * @param $category_id
     *
     * @return array
     */
    public function infraredCategoryByBrand($infrared_id, $category_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/categories/{$category_id}/brands");
    }

    /**
     * 获取品牌支持遥控器索引列表.
     *
     * @param $infrared_id
     * @param $category_id
     * @param $brand_id
     *
     * @return array
     */
    public function infraredCategoryBrand($infrared_id, $category_id, $brand_id)
    {
        return $this->httpGet("/infrareds/{$infrared_id}/categories/{$category_id}/brands/{$brand_id}");
    }

    /**
     * 添加普通遥控器.
     *
     * @param      $infrared_id
     * @param      $category_id
     * @param      $remote_index
     * @param null $brand_id
     * @param null $brand_name
     * @param null $remote_name
     *
     * @return array
     */
    public function addRemote($infrared_id, $category_id, $remote_index, $brand_id = null, $brand_name = null, $remote_name = null)
    {
        $params = [
            'category_id' => $category_id,
            'brand_id' => $brand_id,
            'brand_name' => $brand_name,
            'remote_index' => $remote_index,
            'remote_name' => $remote_name,
        ];

        return $this->httpPostJson("infrareds/{$infrared_id}/normal/add-remote", $params);
    }

    /**
     * 获取省份列表.
     *
     * @param $infrared_id
     *
     * @return array
     */
    public function province($infrared_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/provinces");
    }

    /**
     * 获取城市列表.
     *
     * @param $infrared_id
     * @param $province_id
     *
     * @return array
     */
    public function city($infrared_id, $province_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/provinces/{$province_id}/cities");
    }

    /**
     * 获取区域列表.
     *
     * @param $infrared_id
     * @param $province_id
     * @param $city_id
     *
     * @return array
     */
    public function area($infrared_id, $province_id, $city_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/provinces/{$province_id}/cities/{$city_id}/areas");
    }

    /**
     * 获取运营商列表：根据区域
     *
     * @param $infrared_id
     * @param $area_id
     *
     * @return array
     */
    public function iptvs($infrared_id, $area_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/areas/{$area_id}/iptvs");
    }

    /**
     * 获取品牌列表：根据运营商.
     *
     * @param $infrared_id
     * @param $operator_id
     * @param $country_code
     *
     * @return array
     */
    public function operatorByCountryCode($infrared_id, $operator_id, $country_code)
    {
        $query = [
            'country_code' => $country_code,
        ];

        return $this->httpGet("infrareds/{$infrared_id}/operators/{$operator_id}/brands", $query);
    }

    /**
     * 获取遥控器索引列表：根据品牌id.
     *
     * @param $infrared_id
     * @param $operator_id
     * @param $brand_id
     *
     * @return array
     */
    public function operatorBybrand($infrared_id, $operator_id, $brand_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/operators/{$operator_id}/brands/{$brand_id}/iptvs");
    }

    /**
     * 获取遥控器索引列表：根据区域id.
     *
     * @param $infrared_id
     * @param $operator_id
     * @param $area_id
     *
     * @return array
     */
    public function operatorByArea($infrared_id, $operator_id, $area_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/operators/{$operator_id}/areas/{$area_id}");
    }

    /**
     * 添加机顶盒遥控器.
     *
     * @param      $infrared_id
     * @param      $category_id
     * @param      $brand_id
     * @param      $remote_index
     * @param      $operator_id
     * @param null $brand_name
     * @param null $remote_name
     * @param null $iptv_type
     * @param null $operator_name
     * @param null $area_id
     * @param null $area_name
     *
     * @return array
     */
    public function boxAddRemote($infrared_id, $category_id, $brand_id, $remote_index, $operator_id, $brand_name = null, $remote_name = null, $iptv_type = null, $operator_name = null, $area_id = null, $area_name = null)
    {
        $params = [
            'category_id' => $category_id,
            'brand_id' => $brand_id,
            'remote_index' => $remote_index,
            'operator_id' => $operator_id,
            'brand_name' => $brand_name,
            'remote_name' => $remote_name,
            'iptv_type' => $iptv_type,
            'operator_name' => $operator_name,
            'area_id' => $area_id,
            'area_name' => $area_name,
        ];

        return $this->httpPostJson("infrareds/{$infrared_id}/box/add-remote", $params);
    }

    /**
     * 查询电视频道列表.
     *
     * @param $infrared_id
     * @param $remote_id
     *
     * @return array
     */
    public function channel($infrared_id, $remote_id)
    {
        return $this->httpGet("infrareds/{$infrared_id}/{$remote_id}/channel");
    }
}
