<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Weather;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 查询城市列表
     * @param $country_code
     *
     * @return array
     */
    public function cities($country_code)
    {
        return $this->httpGet("countries/{$country_code}/cities");
    }

    /**
     * 查询城市信息
     * @param $city_id
     *
     * @return array
     */
    public function findCity($city_id)
    {
        return $this->httpGet("cities/{$city_id}");
    }

    /**
     * 根据经纬度查询城市列表
     * @param $lon
     * @param $lat
     *
     * @return array
     */
    public function findCityByPosition($lon, $lat)
    {
        $query = [
            'lon' => $lon,
            'lat' => $lat,
        ];

        return $this->httpGet('position/city', $query);
    }

    /**
     * 查询城市天气预报
     * @param $city_id
     *
     * @return array
     */
    public function weatherForecast($city_id)
    {
        return $this->httpGet("cities/{$city_id}/weather-forecast");
    }

    /**
     * 根据ip查询天气预报,此接口有问题
     * @return array
     */
    public function ipWeatherForecast()
    {
        return $this->httpGet('ip/weather-forecast');
    }

    /**
     * 根据经纬度查询天气
     * @param $lon
     * @param $lat
     *
     * @return array
     */
    public function positionWseather($lon, $lat)
    {
        $query = [
            'lon' => $lon,
            'lat' => $lat,
        ];

        return $this->httpGet('position/weather', $query);
    }

    /**
     * 查询城市当前天气情况
     * @param $city_id
     *
     * @return array
     */
    public function cityWeather($city_id)
    {
        return $this->httpGet("cities/{$city_id}/weathers");
    }
}
