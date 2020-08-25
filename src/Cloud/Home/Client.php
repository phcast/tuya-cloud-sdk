<?php

namespace Phpcast\TuyaCloudSdk\Cloud\Home;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 添加家庭.
     *
     * @param $uid
     * @param $geo_name
     * @param $name
     * @param $lat
     * @param $lon
     *
     * @return array
     */
    public function create($uid,$geo_name, $name, $lat, $lon, array $rooms)
    {
        $params = [
            'uid' => $uid,
            'home' => [
                'geo_name' => $geo_name,
                'name' => $name,
                'lat' => $lat,
                'lon' => $lon,
            ],
            'rooms' => $rooms,
        ];

        return $this->httpPostJson('home/create-home', $params);
    }

    /**
     * 修改家庭.
     *
     * @param      $home_id
     * @param null $geo_name
     * @param null $name
     * @param null $lat
     * @param null $lon
     *
     * @return array
     */
    public function update($home_id, $geo_name = null, $name = null, $lat = null, $lon = null)
    {
        $params = [
            'geo_name' => $geo_name,
            'name' => $name,
            'lat' => $lat,
            'lon' => $lon,
        ];

        return $this->httpPut("homes/{$home_id}", [], $params);
    }

    /**
     * 删除家庭.
     *
     * @author zenglin
     *
     * @param $home_id
     *
     * @return array
     */
    public function delete($home_id)
    {
        return $this->httpDelete("homes/{$home_id}");
    }

    /**
     * 查询家庭.
     *
     * @param $home_id
     *
     * @return array
     */
    public function find($home_id)
    {
        return $this->httpGet("homes/{$home_id}", []);
    }

    /**
     * 查询家庭下的设备详情.
     *
     * @param $home_id
     *
     * @return array
     */
    public function devices($home_id)
    {
        return $this->httpGet("homes/{$home_id}/devices", []);
    }

    /**
     * 添加房间.
     *
     * @param $home_id
     * @param $name
     *
     * @return array
     */
    public function createRoom($home_id, $name)
    {
        $parmas = [
            'name' => $name,
        ];

        return $this->httpPostJson("homes/{$home_id}/room", $parmas);
    }

    /**
     * 修改房间.
     *
     * @param $home_id
     * @param $room_id
     * @param $name
     *
     * @return array
     */
    public function updateRoom($home_id, $room_id, $name)
    {
        $parmas = [
            'name' => $name,
        ];

        return $this->httpPut("homes/{$home_id}/rooms/{$room_id}", [], $parmas);
    }

    /**
     * 删除房间.
     *
     * @param $home_id
     * @param $room_id
     *
     * @return array
     */
    public function deleteRoom($home_id, $room_id)
    {
        return $this->httpDelete("homes/{$home_id}/rooms/{$room_id}");
    }

    /**
     * 查询家庭和房间信息.
     *
     * @param $home_id
     *
     * @return array
     */
    public function findRooms($home_id)
    {
        return $this->httpGet("homes/{$home_id}/rooms");
    }

    /**
     * 查询家庭房间设备.
     *
     * @param $home_id
     * @param $room_id
     *
     * @return array
     */
    public function findRoomDevice($home_id, $room_id)
    {
        return $this->httpGet("homes/{$home_id}/rooms/{$room_id}/devices");
    }

    /**
     * 添加家庭成员.
     *
     * @param $home_id
     * @param $app_schema
     * @param $country_code
     * @param $member_account
     * @param $name
     *
     * @return array
     */
    public function addMember($home_id, $app_schema, $country_code, $member_account, bool $isAdmin, $name)
    {
        $params = [
            'app_schema' => $app_schema,
            'member' => [
                'country_code' => $country_code,
                'member_account' => $member_account,
                'admin' => $admin,
                'name' => $name,
            ],
        ];

        return $this->httpPostJson("homes/{$home_id}/members", $params);
    }

    /**
     * 设置成员权限.
     *
     * @param $home_id
     * @param $uid
     * @param $isAdmin
     *
     * @return array
     */
    public function setMember($home_id, $uid, $isAdmin)
    {
        $params = [
            'admin' => $isAdmin,
        ];

        return $this->httpPut("homes/{$home_id}/members/{$uid}", $params);
    }

    /**
     * 删除家庭成员.
     *
     * @param $home_id
     * @param $uid
     *
     * @return array
     */
    public function deleteMember($home_id, $uid)
    {
        return $this->httpDelete("homes/{$home_id}/members/{$suid}");
    }

    /**
     * 查询家庭成员.
     *
     * @param $home_id
     *
     * @return array
     */
    public function findMembers($home_id)
    {
        return $this->httpGet("homes/{$home_id}/members");
    }

    /**
     * 查询⽤户所在的家庭列表.
     *
     * @param $uid
     *
     * @return array
     */
    public function findMemberHome($uid)
    {
        return $this->httpGet("users/{$uid}/homes");
    }
}
