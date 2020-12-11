<?php

namespace Phpcast\TuyaCloudSdk\Cloud\User;

use Phpcast\TuyaCloudSdk\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 用户列表.
     *
     * @param int|int $page
     * @param int|int $size
     *
     * @return array
     */
    public function users(string $schema, int $page = 1, int $size = 10, ?int $startTime = null, ?int $endTime = null)
    {
        $parmas = [
            'page_no' => $page,
            'page_size' => $size,
            'start_time' => $startTime ?: '',
            'end_time' => $endTime ?: '',
        ];

        return $this->httpGet("apps/{$schema}/users", $parmas);
    }

    /**
     * 同步用户.
     *
     * @param string $nick_name
     *
     * @return array
     */
    public function synUsers(string $schema, string $country_code, string $username, string $password, string $username_type, ?string $nick_name)
    {
        $params = [
            'country_code' => $country_code,
            'username' => $username,
            'password' => $password,
            'username_type' => $username_type,
            'nick_name' => $nick_name,
        ];

        return $this->httpPostJson("apps/{$schema}/user", $params);
    }

    /**
     * 所有国家.
     *
     * @return array
     */
    public function allCountry()
    {
        return $this->httpGet('all-countries', []);
    }

    /**
     * 用户信息.
     *
     * @author zenglin
     *
     * @return array
     */
    public function infos(string $uid)
    {
        return $this->httpGet("users/{$uid}/infos", []);
    }

    /**
     * 获取用户token.
     *
     * @return array
     */
    public function token(string $uid)
    {
        return $this->httpGet("users/{$uid}/token", []);
    }

    /**
     * 核对用户信息.
     *
     * @return array
     */
    public function userCheck(string $schema, string $username, string $username_type, string $password, string $country_code)
    {
        $params = [
            'country_code' => $country_code,
            'username' => $username,
            'password' => $password,
            'username_type' => $username_type,
        ];

        return $this->httpPostJson("users/{$schema}/user-check", $params);
    }

    /**
     * 根据用户临时票据ticket换取授权令牌.
     *
     * @return array
     */
    public function authorization(string $ticket)
    {
        $params = [
            'ticket' => $ticket,
        ];

        return $this->httpPostJson('user/sso/authorization', $params);
    }

    /**
     * 校验ticket.
     *
     * @author zenglin
     *
     * @return array
     */
    public function verification($ticket)
    {
        $params = [
            'ticket' => $ticket,
        ];

        return $this->httpPostJson('user/sso/ticket/verification', $params);
    }

    /**
     * 第三方免密同步用户.
     *
     * @return array
     */
    public function synchronization(string $country_code, string $from, string $username, string $schema)
    {
        $params = [
            'country_code' => $country_code,
            'from' => $from,
            'username' => $username,
            'schema' => $schema,
        ];

        return $this->httpPostJson('user/thirdparty/synchronization', $params);
    }

    /**
     * 小程序用户登录.
     *
     * @param $code
     * @param $encrypted_data
     * @param $iv
     * @param $schema
     *
     * @return array
     */
    public function wxlogin(string $code, string $encrypted_data, string $iv, string $schema)
    {
        $params = [
            'code' => $code,
            'encrypted_data' => $encrypted_data,
            'iv' => $iv,
            'schema' => $schema,
        ];

        return $this->httpPostJson('user/wx-applet/login', $params);
    }

    /**
     * 获取用户的ticket.
     *
     * @return array
     */
    public function ticket(string $uid)
    {
        return $this->httpPost("users/{$uid}/ticket", []);
    }
}
